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
			<div data-spy="scroll" data-target="#myScrollspy" data-offset="10"
			style="height: calc(100vh - 30px);overflow-y: scroll;min-width: 1000px;overflow-x: scroll;overflow-x: hidden;">
			<div class="row m-0">
				<div class="col-2">
					<p class="font-weight-bold" style="font-size: 130%">Book Detail</p>
				</div>
				<div class="col-10">
					<a href="{{ url('/') }}">
						<div class="bg float-right btn text-white" style="height: 40px">Back</div>	
					</a>		
				</div>
			</div>



			<div class="mb-0 p-3 row">
				<div class="col-3 pl-0 pr-5">
					<div class="mb-2">
						<img  src="../images/books/{{$BookDetail->image}}" width="100%" height="100%">
						<a href="{{url('book-edit/'.$BookDetail->id)}}">
							<div class="btn bg mt-2 text-white" style="position: absolute;left: 7px"><i class="fa fa-pencil" aria-hidden="true"></i></div>
						</a>
						<a href="{{url('book-delete/'.$BookDetail->id)}}">
							<div class="btn bg mt-2 text-white" style="position: absolute;left: 53px"><i class="fa fa-trash" aria-hidden="true"></i></div>
						</a>
						<a href="{{url('book-rental/'.$BookDetail->id)}}">
							<div class="btn bg mt-2 text-white" style="position: absolute;left: 98px"><i class="fa fa-plus" aria-hidden="true"></i></div>
						</a>
					</div>
					
					<p class="mb-0 font-weight-bold float-left mr-1">Quanlity:</p>
					<p class="mb-0 float-right">{{$BookDetail->quanlity}}</p>
					<div style="clear: both;"></div>
					<p class="mb-0 font-weight-bold float-left mr-1">Total Rental:</p>
					<p class="mb-0 float-right">{{$BookDetail->total_rental}}</p>
					<div style="clear: both;"></div>
					<p class="font-weight-bold float-left mr-1 mb-0">Price:</p>
					<p id="priceBook" class="font-weight-bold float-right cl mb-0"></p>
					<div style="clear: both;"></div>


					<script type="text/javascript">
						$( document ).ready(function() {
							$("#priceBook").text("{{$BookDetail->price}}".toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."))
						});
					</script>
				</div>		
				<div class="col-9 p-0">
					<p class="font-weight-bold mb-0" style="font-size: 130%">Changing Life With Arithmetic Multiplication</p>
					<p class="mb-0 cl" style="font-size: 90%">{{$BookDetail->namecategory}} - {{date('d/m/Y', strtotime($BookDetail->created_at))}}</p>
					
					
					<p style="font-size: 90%">{!!nl2br($BookDetail->note)!!}</p>
				</div>
				

			</div>


			<div class="m-0 p-0 row">
				<style type="text/css">
					.shadow-ok{
						-webkit-box-shadow: 9px 14px 25px -22px rgba(104,215,7,0.27);
						-moz-box-shadow: 9px 14px 25px -22px rgba(104,215,7,0.27);
						box-shadow: 9px 14px 25px -22px rgba(104,215,7,0.27);
					}
				</style>
				<div class="mt-5" style="display: flex;width: 100%">
					<p class="ml-2 mb-0 font-weight-bold line_1" style="width: 3%;">ID</p>
					<p class="ml-2 mb-0 font-weight-bold line_1" style="width: 13%;">Passport</p>
					<p class="ml-2 mb-0 font-weight-bold line_1 " style="width: 13%;">Name</p>
					<p class="ml-2 mb-0 font-weight-bold line_1 " style="width: 13%;">Phone</p>
					<p class="ml-2 mb-0 font-weight-bold line_1" style="width:13%;">Address</p>
					<p class="ml-4 mb-0 font-weight-bold line_1" style="width: 15%;">From date</p>
					<p class="ml-4 mb-0 font-weight-bold line_1" style="width:15%;">To date</p>
				</div>
				@foreach($UserRentalList as $UserRentalList)
				<div id="box-user" class="shadow-ok mt-1 pt-2" style="width: 100%;background: #fff;border-radius: 10px;height: 50px;display: flex;">
					<p class=" mb-0 ml-2 line_1" style="width: 4%;font-size: 90%">{{$UserRentalList->id}}</p>
					<p class=" mb-0  line_1" style="width: 14%;font-size: 90%">{{$UserRentalList->passport}}</p>
					<p class=" mb-0  line_1 " style="width: 13.5%;font-size: 90%">{{$UserRentalList->nameuser}}</p>
					<p class="mb-0 line_1 " style="width: 13.5%;font-size: 90%">{{$UserRentalList->phone}}</p>
					<p class=" mb-0 line_1" style="width:15.3%;font-size: 90%">{{$UserRentalList->address}}</p>
					<p class=" mb-0  line_1" style="width: 17.5%;font-size: 90%">{{date('d/m/Y', strtotime($UserRentalList->from_date))}}</p>
					<p class=" mb-0 line_1" style="width:15%;font-size: 90%">{{date('d/m/Y', strtotime($UserRentalList->to_date))}}</p>
				</div>
				@endforeach


				<div style="clear: both;"></div>
			</div>

		</div>
	</div>
	<div class="p-3 bg-white" style="width: 300px;height: calc(100vh - 70px);border:3px solid #f7f8fa;z-index: 9999;">
		@include('partials.home-info-admin')
		@include('partials.home-analytics')
		@include('partials.home-feature-admin')
		
	</div>
</div>
</div>
@endsection