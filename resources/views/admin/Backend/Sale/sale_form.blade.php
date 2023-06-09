@extends('admin.aDashboard')
@section('admins')

<!-- Content Wrapper. Contains page content -->
  
<div class="container-full">
	<!-- Content Header (Page header) -->

	<!-- Main content -->
	<section class="content">
		<form class="insert-form" id="insert_form" method="post" action="{{ route('sale.store') }}">
			@csrf
	
			<div class="row">
				<div class="col">
					<div class="row mb-3">
						<div class="col-2"><label for="mySelect">Customer</label></div>
						
						<div class="col">
							<input type="text" name="customer_name" id="customer_name" class="form-control mb-3" placeholder=" Customer Name">
						</div>					
						</div>
	
						<div class="row mb-3">
							<div class="col-2"><label>Phone</label></div>
							<div class="col"><input class="form-control mb-3" type="text" id="phone" name="phone"></div>
						</div>
	
						<div class="row mb-3">
							<div class="col-2"><label>Address</label></div>
							<div class="col"><input class="form-control mb-3" type="text" id="address" name="address"></div>
						</div>
				</div>
				<div class="col">
					<div class="row mb-3">
						<div class="col-2"><label>Sale Date</label></div>
						<div class="col"><input class="form-control mb-3" type="date" id="sale_date" name="sale_date">	@error('sale_date') 
							<span class="text-danger">{{ $message }}</span>
							@enderror </div>
					
					</div>
					<div class="row mb-3">
						<div class="col-2"><label>Payment Type</label></div>
						<div class="col">
							<select class="form-control mb-3" name="payment_type" id="payment_type">
								<option value="Cash">Cash On Delivery</option>
								<option value="Online">Online Payment</option>
							</select>
						</div>
						
					</div>
					{{-- <div class="row mb-3">
						<div class="col"><input class="form-control mb-3" type="hidden" id="auth_id" name="auth_id"  value="{{ Auth::id()}}">
						</div>
					</div> --}}
			
				</div>
			</div>
			{{-- <div class="row mb-3">
				<div class="col-1"><label>Details</label></div>
				<div class="col"><input class="form-control mb-3" type="text" id="details" name="details"></div>
			</div> --}}
			<div class="input-field">
				<table class="table table-bordered" id="table_field">
					  <tr>
						  <th>Item Information</th>
						  {{-- <th>Description</th>  --}}
						  <th>Rate</th>
						  <th>Qty</th>
						  <th>Total</th>
						  <th>Add or Remove</th>
					</tr>
					<tr>
						  <td>
							<select id="item" name="item[]" class="js-example-basic-single form-control" required="">
								<option value="" selected="" disabled="">Select Product</option>
								@foreach($products as $product)
									 <option data-tokens="{{ $product->product_name }}" value="{{ $product->id }}">{{ $product->product_name }} ({{$product->product_code}})</option>	
								@endforeach
							</select>

						</td>
						  {{-- <td><input class="form-control" type="text" id="description" name="description[]" required=""></td> --}}
						  <td><input class="form-control unit_price" type="text" id="unit_cost" name="unit_cost[]" required=""></td>
						  <td><input class="form-control qty" type="text" id="qty" name="qty[]" required=""></td>
						  <td><input class="form-control total" type="text" id="amount" name="amount[]" value="0" readonly></td>
						  <td><input class="btn btn-warning" type="button" name="add" id="add" value="Add"></td>
					</tr>
				</table>
				
					<div class="row">
					<div class="col">
					</div>

					<div class="col-4">
						<div class="row mb-3">
							<div class="col-4"><label>Sub Total</label></div>
							<div class="col"><span><input class="form-control" type="text" name="subtotal" id="subtotal" readonly></span>
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-4"><label>Discount (%)</label></div>
							<div class="col"><input class="dper form-control" type="number" id="discount-percentage" name="dper">
							</div>
						</div>
						{{-- <div class="row mb-3">
							<div class="col-4"><label>VAT (%)</label></div>
							<div class="col"><input class="vper form-control" type="number" id="vat-percentage" name="">
							</div>
						</div> --}}
						<div class="row mb-3">
							<div class="col-4"><label>Discount (TK)</label></div>
							<div class="col"><input class="dflat form-control" name="dflat" type="number" id="discount-flat">
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-4"><label>Delivery Charge</label></div>
							<div class="col"><input class="form-control" type="number" name="delivery_charge" id="delivery_charge">
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-4"><label>Grand Total</label></div>
							<div class="col"><input class="form-control" type="number" name="grandtotal" id="grandtotal" readonly>
							</div>
						</div>
						
						<div class="row mb-3">
							<div class="col-4"><label>Paid Amount</label></div>
							<div class="col"><input class="form-control" type="number" name="paidamount" id="paidamount">
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-4"><label>Due Amount</label></div>
							<div class="col"><input class="form-control" type="number" name="dueamount" id="dueamount" readonly>
							</div>
						</div>

					
					</div>
				</div>
				
					<input class="btn btn-success" type="submit" name="save" id="save" value="
					Save Sale">
	
			</div>
	  </form>
	</section>
	<!-- /.content -->
  
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   {{-- test --}}
   {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" /> --}}

   {{-- test --}}
   
  <script>
	// Add a search field to the dropdown
	$("#mySearch").on("keyup", function() {
	  var value = $(this).val().toLowerCase();
	  $("#mySelect option").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	  });
	});
  </script>
  
  <script>
	$(document).ready(function(){
		var html='<tr><td><select id="item" name="item[]" class="js-example-basic-single form-control" required=""><option value="" selected="" disabled="">Select Product</option>@foreach($products as $product)<option data-tokens="{{ $product->product_name }}" value="{{$product->id }}">{{ $product->product_name }} ({{$product->product_code}})</option>@endforeach</select></td><td><input class="form-control unit_price" type="text" id="unit_cost" name="unit_cost[]" required=""></td><td><input class="form-control qty" type="text" id="qty" name="qty[]" required=""><td><input class="form-control total" type="text" id="amount" name="amount[]" value="0" readonly></td></td><td><input class="btn btn-danger" type="button" name="remove" id="remove" value="remove"></td></tr>';
		var x =1;
	  $("#add").click(function(){
		$("#table_field").append(html);
		$('.js-example-basic-single').select2();

	  });
	  $("#table_field").on('click', '#remove', function () {
    $(this).closest('tr').remove();
	$('.js-example-basic-single').select2();
	});
	
	$("#table_field tbody").on("input", ".unit_price", function () {
                var unit_price = parseFloat($(this).val());
                var qty = parseFloat($(this).closest("tr").find(".qty").val());
                var total = $(this).closest("tr").find(".total");
                total.val(unit_price * qty);
				totalPrice();
            });
	$("#table_field tbody").on("input", ".qty", function () {
		var qty = parseFloat($(this).val());
		var unit_price = parseFloat($(this).closest("tr").find(".unit_price").val());
		var total = $(this).closest("tr").find(".total");
		total.val(unit_price * qty);
		totalPrice();
	});
	// $("#discount-percentage").on("input", ".dper", function () {
	// 	var discount_value = this.value;
	// 	var grandtotal = document.getElementById("grandtotal").value;
	// 	var discount = grandtotal - (discount_value / 100) * grandtotal;
	// 	$("#grandtotal").val(discount);
	// 	console.log(discount);
	// });

	function totalPrice(){
		var sum = 0;
	
		$(".total").each(function(){
		sum += parseFloat($(this).val());
		});
		// var delivery_charge = document.getElementById("delivery_charge").value;
		// sum += delivery_charge;

		$("#grandtotal").val(sum);
		$("#subtotal").val(sum);	
	}

	document.querySelector('#delivery_charge').addEventListener('input', function() {
		// $("#grandtotal").val("");
 		var delivery_charge = this.value;
		var grandtotal = document.getElementById("subtotal").value;
		var delivery = parseInt(grandtotal) + parseInt(delivery_charge);
		$("#grandtotal").val(delivery);
		
	});
	
	document.querySelector('#discount-percentage').addEventListener('input', function() {
		$("#discount-flat").val("");
 		var discount_value = this.value;
		var grandtotal = document.getElementById("subtotal").value;
		var discount = grandtotal - (discount_value / 100) * grandtotal;
		$("#grandtotal").val(discount);
		console.log(discount);
  // Now you can use the inputValue variable to access the value of the input element
	});
	document.querySelector('#discount-flat').addEventListener('input', function() {
		$("#discount-percentage").val("");
 		var discount_value = this.value;
		var grandtotal = document.getElementById("subtotal").value;
		var discount = grandtotal - discount_value;
		$("#grandtotal").val(discount);
		console.log(discount);
  // Now you can use the inputValue variable to access the value of the input element
	});

// 	document.querySelector('#vat-percentage').addEventListener('input', function() {
//  		var vat_value = this.value;
// 		var grandtotal = document.getElementById("subtotal").value;
// 		var vat = ((vat_value / 100) * grandtotal) + parseInt(grandtotal);
// 		$("#grandtotal").val(vat);
// 		console.log(vat);
//   // Now you can use the inputValue variable to access the value of the input element
// 	});

	$("#mySelect").change(function() {
      // get the selected option value
      var selectedOption = $(this).val();

      // make an AJAX request to the server
      $.get('/get-data', { option: selectedOption }, function(data) {
        // update the field with the response data
        $("#address").val(data.address);
		$("#phone").val(data.phone);
		console.log(data);
		$('.js-example-basic-single').select2();

      });
    });

	// $("#item").change(function() {
    //   // get the selected option value
    //   var selectedOption = $(this).val();
	// 	console.log('hello');
    //   // make an AJAX request to the server
    //   $.get('/get-data-product', { option: selectedOption }, function(data) {
    //     // update the field with the response data
    //     $("#unit_cost").val(data.selling_price);
    //   });
    // });

	$("#table_field tbody").on("change", "select[name='item[]']", function () {
		var product_id = $(this).val();
		var price = $(this).closest("tr").find(".unit_price");
		$.get('/get-price', { option: product_id }, function(data) {
        // update the field with the response data
		if(data.discount_price == null){
			price.val(data.selling_price);
		}else{
			price.val(data.discount_price);
		}
			
      });
		// price.val(product_id);
               
    });

	document.querySelector('#paidamount').addEventListener('input', function() {
		$("#dueamount").val("");
 		var paidamount = this.value;
		var grandtotal = document.getElementById("grandtotal").value;
		var duetotal = grandtotal - paidamount;
		$("#dueamount").val(duetotal);
		console.log(discount);
  // Now you can use the inputValue variable to access the value of the input element
	});

	// $("select[name='item[]']").each(function() {
	// 	var selectedOption = $(this).val();
	// 	console.log('hello');
		
	// });

	document.querySelector('#delivery_charge').addEventListener('input', function() {
		// $("#grandtotal").val("");
 		var delivery_charge = this.value;
		var grandtotal = document.getElementById("subtotal").value;
		var delivery = parseInt(grandtotal) + parseInt(delivery_charge);
		$("#grandtotal").val(delivery);
		
	});
	
	$(function() {
		$('.selectpicker').selectpicker();
	});

    $('.js-example-basic-single').select2();

	});
</script>

@endsection