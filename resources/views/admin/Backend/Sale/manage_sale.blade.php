@extends('admin.aDashboard')
@section('admins')

  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Sales List <span class="badge badge-pill badge-danger"> {{ count($sales) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>SL.</th>
								<th>Invoice</th>
								<th>Customer Name</th>
								<th>Sale Date</th>
								<th>Discount %</th>
								<th>Grand Total</th>
								<th>Created By</th>
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
			@php
				$sl = 1;
			@endphp
	 @foreach($sales as $item)
	 <tr>
		<td width="5%">{{ $sl++ }}</td>
        <td>{{ $item->invoice_no }}</td>
		<td>{{ $item->customer_name }}</td>
		<td>{{ $item->sale_date }}</td>
		 <td>{{ $item->sub_total }} </td>
		 <td> 
			@if($item->discount_percentage == NULL && $item->discount_flat == NULL)
			<span class="badge badge-pill badge-danger">No Discount</span>
			@elseif ($item->discount_percentage == NULL)
			  <span class="badge badge-pill badge-danger">TK {{ round($item->discount_flat)  }}</span>
			@else
			<span class="badge badge-pill badge-danger">{{ $item->discount_percentage }}%</span>
			@endif
		</td>

			<td>TK {{ $item->grand_total }} </td>

		<td width="30%">
 {{-- <a href="" class="btn btn-primary" title="Quotation View"><i class="fa fa-eye"></i> </a> --}}


 <a href="{{ route('sale.invoice.download',$item->id) }}" class="btn btn-danger" title="Download Quotation">
 	<i class="fa fa-download"></i></a>
	
	 <a href="{{ route('sale.invoice.delete',$item->id) }}" class="btn btn-info" title="Delete Data"><i class="fa fa-trash"></i> </a>

		</td>
							 
	 </tr>
	  @endforeach
						</tbody>
						 
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			          
			</div>
			<!-- /.col -->

 
 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection