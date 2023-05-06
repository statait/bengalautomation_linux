<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    // public function DistrictGetAjax($division_id){

    // 	$ship = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
    // 	return json_encode($ship);

    // } // end method 


    //  public function StateGetAjax($district_id){

    // 	$ship = ShipState::where('district_id',$district_id)->orderBy('state_name','ASC')->get();
    // 	return json_encode($ship);

    // } // end method 

    public function CheckoutStore(Request $request){
        //  dd($request->all());

		$request->validate([ 'division_id' => 'required', 'district_id' => 'required','notes' => 'required'], [ 'division_id.required' => 'Please select a division.', 'district_id.required' => 'Please select a district.','notes.required' => 'Please enter your address.']);	

		$cartTotal = Cart::total();

        $data = array();
    	$data['shipping_name'] = $request->shipping_name;
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_phone'] = $request->shipping_phone;
    	$data['post_code'] = $request->post_code;
    	$data['division_id'] = $request->division_id;
    	$data['district_id'] = $request->district_id;
    	$data['state_id'] = $request->state_id;
		// $data['state_id'] = $grandTotal;
    	$data['notes'] = $request->notes;

		// $data['coupon'] = $request->;
		if(	$data['division_id'] == 7){
			 $grandTotalStr = Cart::total();
			 $cartTotal = (float) str_replace(',', '', $grandTotalStr);
			//  preg_replace('/[^0-9]/', '', $grandTotalStr);
			// $cartTotal = floor(intval(preg_replace('/[^0-9]/', '', Cart::total()), 10));
			$delivery = 70;
			$grandTotal =  $cartTotal + 70;
		}else{
			$grandTotalStr = Cart::total();
			$cartTotal = (float) str_replace(',', '', $grandTotalStr);
			$delivery = 120;
			$grandTotal =  $cartTotal + 120;
		}

		
		
		// $total = (int)str_replace(',','',Cart::total());
		// $total_amount = round($total - $total * $coupon->coupon_discount/100);

    	if ($request->payment_method == 'cod') {
    		return view('frontend.payment.cash',compact('data','cartTotal','grandTotal','delivery'));
    	}elseif ($request->payment_method == 'pos') {
    		return view('frontend.payment.cash',compact('data','cartTotal','grandTotal','delivery'));
    	}else{
			return view('frontend.payment.cash',compact('data','cartTotal','grandTotal','delivery'));
    	}


    }// end mehtod. 
 

}
