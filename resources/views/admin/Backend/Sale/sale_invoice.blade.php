<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Invoice</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 13px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: #ff7c00;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: #ff7c00;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }

    .t {
  border: 1px solid black;
  border-collapse: collapse;
}

</style>

</head>
<body>

  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <br><br>
          <img width="200px" height="72px" src="frontend/assets/img/logo1.png" alt="">
          {{-- <h2 style="color: #ff7c00; font-size: 26px;"><strong>Bengal Automation.</strong></h2> --}}
        </td>
        <td align="right">
            <pre class="font" >
              Bengal Automation
               Email:info@bengalautomation.com <br>
               Mob: 01603815703 
            </pre>
        </td>
    </tr>
  </table>


  <table width="100%" style="background:white; padding:2px;"></table>
  <table width="100%" style="background: #F7F7F7; padding:0 5px 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
           <strong>Name:</strong> {{ $sale->customer_name }}<br>
           {{-- <strong>Email:</strong> {{ $sale->email }} <br> --}}
           <strong>Phone:</strong> {{ $sale->phone }} <br>
           {{-- @php
            $div = $sale->division->division_name;
            $dis = $sale->district_id;
            // $state = $sale->state->state_name;
           @endphp
             --}}
           <strong>Address:</strong>{{ $sale->address }}
           {{-- <strong>Post Code:</strong> {{ $sale->post_code }} --}}
         </p>
        </td>
        <td>
          <p class="font">
            <h3><span style="color: #ff7c00;">Invoice:</span> #{{ $sale->invoice_no}}</h3>
            Order Date: {{ $sale->sale_date }} <br>
            {{-- Delivery Date: {{ $sale->sale_date }} <br> --}}
            Payment Type : {{ $sale->payment_type }} </span>
         </p>
        </td>
    </tr>
  </table>
  <br/>
<h3>Products</h3>
  <table class="t" width="100%">
    <thead style="background-color: #ff7c00; color:#FFFFFF;">
      <tr class="font">
        <th class="t">Image</th>
        <th class="t">Product Name</th>
        <th class="t">Size</th>
        <th class="t">Color</th>
        <th class="t">Code</th>
        <th class="t">Quantity</th>
        <th class="t">Unit Price </th>
        <th class="t">Discount </th>
        <th class="t">Total </th>
      </tr>
    </thead>
    <tbody>
     @foreach($saleItem as $item)
      <tr class="font">
        <td class="t" align="center">
            <img src="{{ public_path($item->product->product_thambnail)  }}" height="60px;" width="60px;" alt="">
        </td>
        <td class="t" align="center"> {{ $item->product->product_name }}</td>
        <td class="t" align="center">
          @if($item->product->product_size == NULL)
           Default
          @else
            {{ $item->product->product_size }}
          @endif
            
        </td>
        <td class="t" align="center">{{ $item->product->product_color }}</td>
        <td class="t" align="center">{{ $item->product->product_code }}</td>
        <td class="t" align="center">{{ $item->qty }}</td>
        <td class="t" align="center">TK {{ $item->product->selling_price }}</td>
       
        <td class="t" align="center">
        @if ($item->product->discount_price == NULL)
          --
        @else
        TK {{ $item->product->discount * $item->qty  }}
        @endif
        </td>
        
        <td class="t" align="center">TK {{ $item->price * $item->qty }} </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
  <br>
  <table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >
         
          <hr>  
          @if ($sale->discount_flat == NULL && $sale->discount_percentage == NULL)
            
          @elseif ($sale->discount_flat == NULL)
          <h3><span style="color: #ff7c00;">Discount Amount ({{ $sale->discount_percentage }}%): </span> <span style="font-size: 12px"> {{ $sale->sub_total * (($sale->discount_percentage)/100)}}</span></h3>
          @elseif ($sale->discount_percentage == NULL)
          <h3><span style="color: #ff7c00;">Discount Amount (TK): </span> <span style="font-size: 12px"> {{ $sale->discount_flat }}</span></h3>
          @endif
          <h3><span style="color: #ff7c00;">Subtotal: </span> <span style="font-size: 12px"> TK {{ $sale->sub_total}}</span></h3>
          <h3><span style="color: #ff7c00;">Delivery Charge: </span> <span style="font-size: 12px"> TK {{ $sale->delivery_charge }}</span></h3>

            <h3><span style="color: #ff7c00;">Total:</span> <span style="font-size: 12px"> TK {{ $sale->grand_total }}</span></h3>
            {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
        </td>
    </tr>
  </table>
  {{-- <div class="thanks mt-3">
    <p>Thanks For Buying Products..!!</p>
  </div> --}}
  <div class="authority float-right mt-5">
    <br>
    <br>
      <p>-----------------------------------</p>
      <h5>Authority Signature:</h5>
    </div>
</body>
</html> 