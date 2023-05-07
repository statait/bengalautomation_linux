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
               Mob: 88 09678200509 
            </pre>
        </td>
    </tr>
  </table>


  <table width="100%" style="background:white; padding:2px;"></table>
  <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
           <strong>Name:</strong> {{ $order->name }}<br>
           <strong>Email:</strong> {{ $order->email }} <br>
           <strong>Phone:</strong> {{ $order->phone }} <br>
           @php
            $div = $order->division->division_name;
            $dis = $order->district_id;
            // $state = $order->state->state_name;
           @endphp
            
           <strong>Address:</strong>{{ $order->notes }} <br> {{ $div }},{{ $dis }}<br>
           <strong>Post Code:</strong> {{ $order->post_code }}
         </p>
        </td>
        <td>
          <p class="font">
            <h3><span style="color: #ff7c00;">Invoice:</span> #{{ $order->invoice_no}}</h3>
            Order Date: {{ $order->order_date }} <br>
             Delivery Date: {{ $order->delivered_date }} <br>
            Payment Type : {{ $order->payment_method }} </span>
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
     @foreach($orderItem as $item)
      <tr class="font">
        <td class="t" align="center">
            <img src="{{ public_path($item->product->product_thambnail)  }}" height="60px;" width="60px;" alt="">
        </td>
        <td class="t" align="center"> {{ $item->product->product_name }}</td>
        <td class="t" align="center">
          @if($item->size == NULL)
           ----
          @else
            {{ $item->size }}
          @endif
            
        </td>
        <td class="t" align="center">{{ $item->color }}</td>
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
          <h3><span style="color: #ff7c00;">Coupon: </span> <span style="font-size: 12px">{{ $order->coupon }}</span></h3>
          <h3><span style="color: #ff7c00;">Discount Amount ({{ $order->coupon_percentage }}%): </span> <span style="font-size: 12px"> {{ $order->coupon_discount }}</span></h3>
          <h3><span style="color: #ff7c00;">Subtotal: </span> <span style="font-size: 12px"> TK {{ $order->amount - $order->state_id}}</span></h3>
          <h3><span style="color: #ff7c00;">Delivery Charge: </span> <span style="font-size: 12px"> TK {{ $order->state_id }}</span></h3>

            <h3><span style="color: #ff7c00;">Total:</span> <span style="font-size: 12px"> TK {{ $order->amount }}</span></h3>
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