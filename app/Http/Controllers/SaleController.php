<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use PDF;

class SaleController extends Controller
{
    public function SaleForm() 
    {
        $products = Product::orderBy('product_name','ASC')->get();
        return view('admin.Backend.Sale.sale_form', compact('products'));
    }

    public function SaleStore(Request $request)
    {
        // $request->validate([
    	// 	'customer_id' => 'required',
    	// 	'quoDate' => 'required',
        //     'expDate' => 'required',
    	// ],[
    	// 	'customer_id.required' => 'Please Select a Customer',
        //     'quoDate.required' => 'Please Enter Quotation Date',
        //     'expDate.required' => 'Please Enter Quotation Expiry Date',
    	// ]);

        $sale_id = Sale::insertGetId([

            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'payment_type' => $request->payment_type,
            'invoice_no' => 'BA'.mt_rand(10000000,99999999),
            'sale_date' => $request->sale_date,
            'sub_total' => $request->subtotal,
            'delivery_charge' => $request->delivery_charge,
            'grand_total' => $request->grandtotal,
            'discount_percentage' => $request->dper,
            'discount_flat' => $request->dflat,
            'p_paid_amount' => $request->paidamount,
            'due_amount' => $request->dueamount,
            'created_at' => Carbon::now(),   
  
        ]);

        $item = $request->input('item');
        $unit_cost = $request->input('unit_cost');
        $qty = $request->input('qty');
        $amount = $request->input('amount');
    
        foreach ($item as $key => $value) {
            SaleItem::create([
                'product_id' => $value,
                'sale_id' => $sale_id,
                'qty' => $qty[$key],
                'price' => $unit_cost[$key],
                'amount' => $amount[$key],
            ]);
        }
    
		// return redirect()->back();
        $notification = array(
			'message' => 'Sale Added Successfully',
			'alert-type' => 'success'
		);

        return redirect()->back()->with($notification);

    }

    public function ManageSale(Request $request){
       
        $sales = Sale::latest()->get();
		return view('admin.Backend.Sale.manage_sale',compact('sales'));

    }

    public function SaleInvoiceDownload($sale_id){

		$sale = Sale::where('id',$sale_id)->first();
    	$saleItem = SaleItem::with('product')->where('sale_id',$sale_id)->orderBy('id','DESC')->get();

		$pdf = PDF::loadView('admin.Backend.Sale.sale_invoice',compact('sale','saleItem'))->setPaper('a4')->setOptions([
				'tempDir' => public_path(),
				'chroot' => public_path(),
		]);
		return $pdf->download('Sales_Invoice.pdf');

	} // end method 

    public function SaleDelete($id){
   
		Sale::findOrFail($id)->delete();
		$notification = array(
			'message' => 'Sale Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

	}

    public function getProductPrice(Request $request){

        $selectedOption = $request->input('option');
        $data = Product::findOrFail($selectedOption);
    
        return $data;
    
    }
}
