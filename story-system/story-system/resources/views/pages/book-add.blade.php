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
					<a href="{{ url('book') }}">
						<div class="bg float-right btn text-white" style="height: 40px">Back</div>	
					</a>		
				</div>
			</div>
			<div class="m-0 p-3 row">
				<div class="p-2" style="width: 700px;margin: auto;border:3px solid #f7f8fa">
					<form action="{{ url('book-add') }}" method="POST" enctype='multipart/form-data'>
						{{ csrf_field()}}
						<div class="row m-0">
							<div class="col-6 p-2">
								<label class="font-weight-bold">Name Book</label>
								<div class="mb-2" style="display: flex;">
									<div class="mr-1 text-center bg" style="width: 50px;height: 40px;border-radius: 5px">
										<i class="fa fa-book text-white" aria-hidden="true" style="font-size: 130%;line-height: 39px"></i>
									</div>
									<input type="text" class="form-control" name="name" required>
								</div>
							</div>
							<div class="col-6 p-2">
								<label class="font-weight-bold">Price Book</label>
								<div class="mb-2" style="display: flex;">
									<div class="mr-1 text-center bg" style="width: 50px;height: 40px;border-radius: 5px">
										<i class="fa fa-money text-white" aria-hidden="true" style="font-size: 130%;line-height: 39px"></i>
									</div>
									<input type="number" class="form-control" name="price" required>
								</div>
							</div>
							<div class="col-6 p-2">
								<label class="font-weight-bold">Category</label>
								<div class="mb-2" style="display: flex;">
									<div class="mr-1 text-center bg" style="width: 50px;height: 40px;border-radius: 5px">
										<i class="fa fa-calendar-check-o text-white" aria-hidden="true" style="font-size: 130%;line-height: 39px"></i>
									</div>
									<select class="form-control" name="category">
										@foreach($Category as $Category)
										<option value="{{$Category->id}}">{{$Category->name}}</option>								
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-6 p-2">
								<label class="font-weight-bold">Quanlity</label>
								<div class="mb-2" style="display: flex;">
									<div class="mr-1 text-center bg" style="width: 50px;height: 40px;border-radius: 5px">
										<i class="fa fa-sort-numeric-desc text-white" aria-hidden="true" style="font-size: 130%;line-height: 39px"></i>
									</div>
									<input type="number" class="form-control" name="quanlity" required>
								</div>
							</div>
							<div class="col-2 p-2">
								<div class="text-center" style="width: 100%;height: 160px;border: 2px dashed #ff5722;">
									<i class="fa fa-picture-o cl" aria-hidden="true" style="font-size: 250%;line-height: 160px"></i>
									<input type="file" name="image" style="width: 100%;height: 100%;opacity: 0;position: absolute;left: 0">
								</div>
							</div>
							<div class="col-10 p-2">
								<label class="font-weight-bold">Note</label>
								<textarea class="form-control" name="note" required  style="width: 100%;height: 125px">
								</textarea>							
							</div>
							<div class="col-12 p-2">
								<button class="btn bg text-white" style="width: 100%">Submit</button>
							</div>
						</div>

						
						
						
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