@extends('admin.aDashboard')
@section('admins')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Product </h4>
			   
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

  <form method="post" action="{{ route('product-store') }}" enctype="multipart/form-data" >
		 	@csrf

					  <div class="row">
	<div class="col-12">	


		<div class="row"> <!-- start 1st row  -->
			<div class="col-md-4">

	 <div class="form-group">
	<h6>Select Brand<span class="text-danger">*</span></h6>
	<div class="controls">
		<select name="brand_id" class="form-control" required="" >
			<option value="" selected="" disabled="">Select Brand</option>
			@foreach($brands as $brand)
 <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>	
			@endforeach
		</select>
		@error('brand_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>
				
			</div> <!-- end col md 4 -->

			<div class="col-md-4">

				 <div class="form-group">
	<h6>Select Category<span class="text-danger">*</span></h6>
	<div class="controls">
		<select name="category_id" class="form-control" required="" >
			<option value="" selected="" disabled="">Select Category</option>
			@foreach($categories as $category)
 <option value="{{ $category->id }}">{{ $category->category_name }}</option>	
			@endforeach
		</select>
		@error('category_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>
				
			</div> <!-- end col md 4 -->
 <!-- end col md 4 -->
			
		</div> <!-- end 1st row  -->

<div class="row"> <!-- start 2nd row  -->

	<div class="col-md-4">
		<div class="form-group">
   <h6>Cost Price<span class="text-danger">*</span></h6>
   <div class="controls">
	   <input type="text" name="video_link" class="form-control" >
  </div>
</div>
	   
   </div> <!-- end col md 4 -->
			{{-- <div class="col-md-4">
				<div class="form-group">
					<h6>Sub-Category Select <span class="text-danger">*</span></h6>
					<div class="controls">
						<select name="subcategory_id" class="form-control" required="" >
							<option value="" selected="" disabled="">Select SubCategory</option>
							
						</select>
						@error('subcategory_id') 
					 <span class="text-danger">{{ $message }}</span>
					 @enderror 
					 </div>
						 </div>
			</div>  --}}
			<!-- end col md 4 -->

			<div class="col-md-4">

				 <div class="form-group">
			<h6>Product Name<span class="text-danger">*</span></h6>
			<div class="controls">
				<input type="text" name="product_name" class="form-control" required="">
     @error('product_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 	  </div>
		</div>
				
			</div> <!-- end col md 4 -->


			<div class="col-md-4">
				
			</div> <!-- end col md 4 -->
			
		</div> <!-- end 2nd row  -->



<div class="row"> <!-- start 3RD row  -->
			<div class="col-md-4">

	  <div class="form-group">
			<h6>Product Code <span class="text-danger">*</span></h6>
			<div class="controls">
				<input type="text" name="product_code" class="form-control" required="">
     @error('product_code') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 	  </div>
		</div>
				
			</div> <!-- end col md 4 -->

			<div class="col-md-4">

				 <div class="form-group">
			<h6>Product Quantity <span class="text-danger">*</span></h6>
			<div class="controls">
				<input type="text" name="product_qty" class="form-control" required="">
     @error('product_qty') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 	  </div>
		</div>
				
			</div> <!-- end col md 4 -->


			<div class="col-md-4">


				
			</div> <!-- end col md 4 -->
			
		</div> <!-- end 3RD row  -->






<div class="row"> <!-- start 4th row  -->
			<div class="col-md-4">
				<div class="form-group">
					<h6>Product Tags<span class="text-danger">*</span></h6>
					<div class="controls">
			 <input type="text" name="product_tags" class="form-control" value="Switch,Locks,Sensor" data-role="tagsinput" required="">
			 @error('product_tags') 
			 <span class="text-danger">{{ $message }}</span>
			 @enderror
					  </div>
				</div>
			</div> <!-- end col md 4 -->

			<div class="col-md-4">

				 <div class="form-group">
			<h6>Product Size<span class="text-danger">*</span></h6>
			<div class="controls">
	 <input type="text" name="product_size" class="form-control" required="" value="Regular" data-role="tagsinput">
     @error('product_size') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>
				
			</div> <!-- end col md 4 -->

<!-- end col md 4 -->
			
		</div> <!-- end 4th row  -->

		 

<div class="row"> <!-- start 5th row  -->
			<div class="col-md-4">

	    <div class="form-group">
			<h6>Product Color<span class="text-danger">*</span></h6>
			<div class="controls">
	 <input type="text" name="product_color" class="form-control" value="Black,White,Gold" data-role="tagsinput" required="">
     @error('product_color') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>
				
			</div> <!-- end col md 4 -->

		 <!-- end col md 4 -->


			<div class="col-md-4">

				<div class="form-group">
			<h6>Product Selling Price <span class="text-danger">*</span></h6>
			<div class="controls">
				<input type="text" name="selling_price" class="form-control" required="">
     @error('selling_price') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 	  </div>
		</div>
				
			</div> <!-- end col md 4 -->
			
		</div> <!-- end 5th row  -->




<div class="row"> <!-- start 6th row  -->
			<div class="col-md-4">

	    <div class="form-group">
			<h6>Product Discount Price <span class="text-danger">*</span></h6>
			<div class="controls">
	 <input type="text" name="discount_price" class="form-control" >
     @error('discount_price') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
		</div>
				
			</div> <!-- end col md 4 -->

			<div class="col-md-4">

	    <div class="form-group">
			<h6>Main Thumbnail (263*280) <span class="text-danger">*</span></h6>
			<div class="controls">
	 <input type="file" name="product_thambnail" class="form-control" onChange="mainThamUrl(this)" required="" >
     @error('product_thambnail') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 <img src="" id="mainThmb">
	 		 </div>
		</div>
				 
				
			</div> <!-- end col md 4 -->

			
		</div> <!-- end 6th row  -->





<div class="row"> <!-- start 7th row  -->
			
	<div class="col-md-4">
				<div class="form-group">
					<h6>Multiple Image (555*600) <span class="text-danger">*</span></h6>
					<div class="controls">
			 <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg" required="" >
			 @error('multi_img') 
			 <span class="text-danger">{{ $message }}</span>
			 @enderror
			 <div class="row" id="preview_img"></div>
		
					  </div>
					  
				</div>				

		
			</div>

			<div class="col-md-4">
				 
				{{-- <div class="form-group">
					<h6>Features<span class="text-danger">*</span></h6>
					<div class="controls">
			<textarea name="short_descp" id="textarea" class="form-control" data-role="tagsinput" required placeholder="Textarea text"></textarea>     
					  </div>
			</div> <!-- end col md 6 --> --}}
			
			

			<div class="form-group">
				<h6>Features<span class="text-danger">*</span></h6>
				<div class="controls">
		 <input type="text" name="short_descp" class="form-control" value="Smart App,Password,RFID Card,Generate Guest OTP,Traditional Key" data-role="tagsinput" required="">
		 @error('short_descp') 
		 <span class="text-danger">{{ $message }}</span>
		 @enderror
				  </div>
			</div>
			
		</div> <!-- end 7th row  -->



	</div> <!-- end col md 6 -->

			

		
		 
		 
	 
<div class="row"> <!-- start 8th row  -->
			<div class="col-md-4">

		<div class="form-group">
			<h6>Long Description<span class="text-danger">*</span></h6>
			<div class="controls">
	<textarea name="long_descp" id="textarea" class="form-control" required placeholder="Long description"></textarea>     
	 		 </div>
		</div>
			</div> <!-- end col md 6 -->


<!-- end col md 6 -->		 
			
		</div> <!-- end 8th row  -->

	 
	 <hr>
 


	<div class="row">

		<div class="col-md-2">
			<div class="form-group">
			 
				<div class="controls">
					<fieldset>
						<input type="checkbox" id="checkbox_2" name="sale" value="1">
						<label for="checkbox_2">Latest</label>
					</fieldset>
				</div>
			</div>	 
				
		</div> 

		<div class="col-md-2">
			<div class="form-group">
			 
				<div class="controls">
					<fieldset>
						<input type="checkbox" id="checkbox_3" name="new" value="1">
						<label for="checkbox_3">Upcoming</label>
					</fieldset>
				</div>
			</div>	 
				
		</div> 

		{{-- <div class="col-md-2">
			<div class="form-group">
			 
				<div class="controls">
					<fieldset>
						<input type="checkbox" id="checkbox_4" name="best_seller" value="1">
						<label for="checkbox_4">Best Seller</label>
					</fieldset>
				</div>
			</div>	 
				
		</div>  --}}

		<div class="col-md-2">
			<div class="form-group">
			 
				<div class="controls">
					<fieldset>
						<input type="checkbox" id="checkbox_5" name="combo" value="1">
						<label for="checkbox_5">Combo</label>
					</fieldset>
				</div>
			</div>	 
				
		</div> 

	</div>

						 
						<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>
 
 <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    	$('select[name="subsubcategory_id"]').html('');
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });



 $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subsubcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
 

    });
    </script>


<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>


<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>




@endsection