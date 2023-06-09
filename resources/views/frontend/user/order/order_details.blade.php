@extends('frontend.main_master')
@section('content')

@section('title')
Order Details
@endsection

@include('frontend.common.breadcrumb', ['bread' => "Hello", 'top' =>"Order Details"] )

<section class="order_details section_gap">
	<div class="container">
        @include('frontend.common.user_sidebar')
        <div class="order_details_table">

		<div class="row">
             <div class="col">
                <div class="card">
                  <div class="card-header"><h4>Shipping Details</h4></div>
                 <div class="card-body">
                   <table class="table">
                    <tr>
                      <th> Shipping Name : </th>
                       {{-- <th> </th> --}}
                       <th> {{ $order->name }} </th>
                    </tr>
        
                     <tr>
                      <th> Shipping Phone : </th>
                       {{-- <th>  </th> --}}
                       <th> {{ $order->phone }}  </th>
                    </tr>
        
                     <tr>
                      <th> Shipping Email : </th>
                       {{-- <th></th> --}}
                       <th>{{ $order->email }} </th>
                    </tr>

                    <tr>
                      <th> Address : </th>
                       {{-- <th> </th> --}}
                       <th> {{ $order->notes }} </th>
                    </tr>
        
                     <tr>
                      <th> Division : </th>
                       {{-- <th> </th> --}}
                       <th> {{ $order->division->division_name }} </th>
                    </tr>
        
                     <tr>
                      <th> District : </th>
                       {{-- <th> </th> --}}
                       <th> {{ $order->district_id }}  </th>
                    </tr>
        
                     {{-- <tr>
                      <th> State : </th>
                       <th></th>
                       <th>{{ $order->state->state_name }} </th>
                    </tr> --}}
        
                    <tr>
                      <th> Post Code : </th>
                       {{-- <th></th> --}}
                       <th>{{ $order->post_code }} </th>
                    </tr>
        
                    <tr>
                      <th> Order Date : </th>
                       {{-- <th> </th> --}}
                       <th>{{ $order->order_date }} </th>
                    </tr>
        
                   </table>
        
        
                 </div> 
        
                </div>
        
              </div> <!-- // end col md -5 -->
        
              <div class="col">
                <div class="card">
                  <div class="card-header"><h4>Order Details
        <span class="text-danger"> Invoice : {{ $order->invoice_no }}</span></h4>
                  </div>
                 <div class="card-body">
                   <table class="table">
                    <tr>
                      <th>  Name : </th>
                       <th> {{ $order->user->name }} </th>
                    </tr>
        
                     <tr>
                      <th>  Phone : </th>
                       <th> {{ $order->user->phone }} </th>
                    </tr>
        
                     <tr>
                      <th> Payment Type : </th>
                       <th> {{ $order->payment_method }} </th>
                    </tr>
        
                     {{-- <tr>
                      <th> Tranx ID : </th>
                       <th> {{ $order->transaction_id }} </th>
                    </tr> --}}
        
                     <tr>
                      <th> Invoice  : </th>
                       <th class="text-danger"> {{ $order->invoice_no }} </th>
                    </tr>

                    <tr>
                      <th> Coupon  : </th>
                       <th class="text-danger"> {{ $order->coupon }} </th>
                    </tr>

                    <tr>
                      <th> Discount Amount  ({{ $order->coupon_percentage }}%): </th>
                       <th class="text-danger"> {{ $order->coupon_discount }} </th>
                    </tr>
        
                     <tr>
                      <th> Order Total : </th>
                       <th>TK {{ $order->amount }} </th>
                    </tr>
        
                    <tr>
                      <th> Order : </th>
                       <th>   
                        <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span> </th>
                    </tr>
        
        
        
                   </table>
        
        
                 </div> 
        
                </div>
        
              </div> <!-- // 2ND end col md -5 -->
        
        
     
        <div class="col">
          <br>
          <div class="card">
            <div class="card-header"><h4>Product Details</h4></div>
           <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <tbody>

                      <tr>
                        <td class="col-md-1">
                          <label for=""><b>Image</b></label>
                        </td>
        
                        <td class="col-md-2">
                          <label for=""><b> Product Name </b></label>
                        </td>
        
                        <td class="col-md-2">
                          <label for=""><b> Product Code</b></label>
                        </td>
        
        
                        <td class="col-md-2">
                          <label for=""><b> Color </b></label>
                        </td>
        
                         <td class="col-md-1">
                          <label for=""> <b>Size </b></label>
                        </td>
        
                         <td class="col-md-1">
                          <label for=""> <b>Quantity</b> </label>
                        </td>
        
                        <td class="col-md-3">
                          <label for=""> <b>Price </b></label>
                        </td>
        
                      </tr>
        
        
                      @foreach($orderItem as $item)
               <tr>
                        <td class="col-md-1">
                          {{-- <label for=""><img src="{{ asset($item->product->product_thambnail) }}" height="50px;" width="50px;"> </label> --}}
                          <label for=""><img src="{{ asset($item->product->product_thambnail) }}" height="50px;" width="50px;"> </label>
                        </td>
        
                        <td class="col-md-2">
                          <label for=""> {{ $item->product->product_name }}</label>
                          {{-- <label for=""></label> --}}
                        </td>
        
        
                         <td class="col-md-2">
                          <label for=""> {{ $item->product->product_code }}</label>
                          {{-- <label for=""> </label> --}}
                        </td>
        
                        <td class="col-md-2">
                          <label for=""> {{ $item->color }}</label>
                          {{-- <label for=""> </label> --}}
                        </td>
        
                        <td class="col-md-1">
                          {{-- <label for=""></label> --}}
                          <label for=""> {{ $item->size }}</label>
                        </td>
        
                         <td class="col-md-1">
                          <label for=""> {{ $item->qty }}</label>
                          {{-- <label for=""></label> --}}
                        </td>
        
                  <td class="col-md-3">
                          <label for=""> TK{{ $item->price }}  ( TK {{ $item->price * $item->qty}} ) </label>
                          {{-- <label for=""> </label> --}}
                        </td>
        
                      </tr>
                      @endforeach

                    </tbody>
        
                  </table>
        
                </div>
              </div>
            </div>
          </div>
        

        
               {{-- </div> <!-- / end col md 8 --> --}}
        

        
              </div> <!-- // END ORDER ITEM ROW -->

              @if($order->status !== "delivered")

              @else
        
             
        @php 
          $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
        @endphp
        
        
        @if($order)
        <form action="{{ route('return.order',$order->id) }}" method="post">
         @csrf

          <div class="form-group">
            <label for="label"> Order Return Reason:</label>
            <textarea name="return_reason" id="" class="form-control" cols="30" rows="05">Return Reason</textarea>
        
          </div>
          <button type="submit" class="btn btn-danger">Order Return</button>
      </form>
      @else

      <span class="badge badge-pill badge-warning" style="background: red">You Have send return request for this product</span>
   
      @endif 

  @endif
<br><br>



		</div> <!-- // end row -->

	</div>

</div>
</section>

@endsection 