@extends('Layout.master')
@section('Content')
<style type="text/css">
	.shadow-search{
		-webkit-box-shadow: 4px 5px 22px -9px rgba(0,0,0,0.1);
		-moz-box-shadow: 4px 5px 22px -9px rgba(0,0,0,0.1);
		box-shadow: 4px 5px 22px -9px rgba(0,0,0,0.1);
	}
</style>
<div class="container-fluid p-0">		
	<div style="display: flex;">
		<div class="pl-5 pt-2" style="width: calc(100% - 300px);">
			<div class="row m-0">
				<div class="col-2">
					<p class="font-weight-bold" style="font-size: 130%">User Add</p>
				</div>
				<div class="col-10">
					<a href="{{ url('user-manage') }}">
						<div class="bg float-right btn text-white" style="height: 40px">Back</div>	
					</a>		
				</div>
			</div>
			<div class="m-0 p-3 row">
				<div class="p-3" style="width: 400px;height: 500px;margin: auto;border:3px solid #f7f8fa">
					<form action="{{ url('user-add') }}" method="POST" enctype='multipart/form-data'>
						{{ csrf_field()}}
						<input type="" value="2" name="page" style="display: none;">
						<label class="font-weight-bold">Passport</label>
						<div class="mb-2" style="display: flex;">
							<div class="mr-1 text-center bg" style="width: 50px;height: 40px;border-radius: 5px">
								<i class="fa fa-id-card-o text-white" aria-hidden="true" style="font-size: 130%;line-height: 39px"></i>
							</div>
							<input type="number" class="form-control" name="passport" required>
						</div>
						<label class="font-weight-bold">Fullname</label>
						<div class="mb-2" style="display: flex;">
							<div class="mr-1 text-center bg" style="width: 50px;height: 40px;border-radius: 5px">
								<i class="fa fa-user text-white" aria-hidden="true" style="font-size: 130%;line-height: 39px"></i>
							</div>
							<input type="text" class="form-control" name="name" required>
						</div>
						<label class="font-weight-bold">Address</label>
						<div class="mb-2" style="display: flex;">
							<div class="mr-1 text-center bg" style="width: 50px;height: 40px;border-radius: 5px">
								<i class="fa fa-location-arrow text-white" aria-hidden="true" style="font-size: 130%;line-height: 39px"></i>
							</div>
							<input type="text" class="form-control" name="address" required>
						</div>
						<label class="font-weight-bold">Phone</label>
						<div class="mb-2" style="display: flex;">
							<div class="mr-1 text-center bg" style="width: 50px;height: 40px;border-radius: 5px">
								<i class="fa fa-phone text-white" aria-hidden="true" style="font-size: 130%;line-height: 39px"></i>
							</div>
							<input type="number" class="form-control" name="phone" required>
						</div>
						<label class="font-weight-bold">Image</label>
						<div class="mb-2" style="display: flex;">
							<div class="mr-1 text-center" style="width: 50px;height: 50px;border: 2px dashed #ff5722;">
								<i class="fa fa-picture-o cl" aria-hidden="true" style="font-size: 130%;line-height: 47px"></i>
							</div>
							<input type="file" name="image">
						</div>
						<button class="btn bg text-white" style="width: 100%">Submit</button>
					</form>
				</div>			
			</div>


		</div>
		<div class="p-3 bg-white" style="width: 300px;height: calc(100vh - 70px);border:3px solid #f7f8fa;z-index: 9999">
			@include('partials.home-info-admin')
			@include('partials.home-analytics')
			@include('partials.home-feature-admin')
			
		</div>
	</div>
</div>
@endsection