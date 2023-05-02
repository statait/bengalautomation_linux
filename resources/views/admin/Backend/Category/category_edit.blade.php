@extends('admin.aDashboard')
@section('admins')

  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
	
<!--   ------------ Add Category Page -------- -->

          <div class="col-12">
			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Category </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data" >
	 	@csrf

	 <div class="form-group">
		<h5>Category <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="category_name" class="form-control" value="{{ $category->category_name }}" > 
	 @error('category_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>

	
	<div class="form-group">
		<h5>Category Image <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="file" name="category_image" class="form-control" >
     @error('category_image') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>

	<div class="form-group"> 
		<div class="controls">
			<fieldset>
		 <input type="checkbox" id="checkbox_2" name="featured" value="1" {{ $category->feature == 1 ? 'checked': '' }}>
				<label for="checkbox_2">Feature</label>
			</fieldset>
		</div>
	</div>


	{{-- <div class="form-group">
		<h5>Category Icon  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="category_icon" class="form-control"  value="{{ $category->category_icon }}" >
     @error('category_icon') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	  </div>
	</div>  --}}
					 

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">					 
						</div>
					</form>




					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>

 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection