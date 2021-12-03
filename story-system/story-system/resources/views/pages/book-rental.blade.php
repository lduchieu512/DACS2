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
					</div>
					
					
					
				</div>		
				<div class="col-9 p-0">
					<p class="font-weight-bold mb-0" style="font-size: 130%">Changing Life With Arithmetic Multiplication</p>
					<p class="mb-0 font-weight-bold float-left mr-1">Quanlity:</p>
					<p class="mb-0 float-left mr-5">{{$BookDetail->quanlity}}</p>	
					<p class="mb-0 font-weight-bold float-left mr-1">Total Rental:</p>
					<p class="mb-0 float-left mr-5">{{$BookDetail->total_rental}}</p>	
					<p class="font-weight-bold float-left mr-1 mb-0">Price:</p>
					<p id="priceBook" class="font-weight-bold float-left cl mb-0"></p>
					<div style="clear: both;"></div>
					<div class="row m-0 pt-2">
						<div class="col-5 p-0">
							<form action="{{url('book-rental')}}" method="post">
								{{ csrf_field()}}
								<label class="font-weight-bold">Name User</label>
								<div id="info-user-rental" class="bg" style="width: 100%;height: 40px;border-radius: 5px">

								</div>
								<input value="{{$BookDetail->id}}" type="" name="idbook" style="display: none;">
								<input id="iduser" type="" name="iduser" style="display: none;">
								<label class="font-weight-bold mt-2">From Date</label>
								<input type="date" class="form-control" name="from_date">
								<label class="font-weight-bold mt-2">To Date</label>
								<input type="date" class="form-control" name="to_date">
								<label class="font-weight-bold mt-2">Note</label>
								<input type="text" class="form-control" name="note">
								<button class="col-12 btn bg mt-2 text-white">Submit</button>
							</form>
						</div>
						<div class="col-7 px-4">
							<label class="font-weight-bold">Choose User</label>
							<div class=" shadow-search pl-2 mb-3" style="width: 400px;height: 40px;display: flex;">
								<input id="input-search-value" type="text" name="" style="width: calc(100% - 50px);height:100%;border: 0;outline: none; ">
								<div class="bg text-center" style="width: 50px;height: 40px;">
									<i class="fa fa-search text-white" aria-hidden="true" style="font-size: 140%;line-height: 38px"></i>
								</div>
							</div>
							<div id="add-new-user" style="display: none;">
								<form action="{{ url('user-add') }}" method="POST" enctype='multipart/form-data'>
									{{ csrf_field()}}
									<input type="" value="1" name="page" style="display: none;">
									<label class="font-weight-bold">Passport</label>
									<div class="mb-1" style="display: flex;">
										<div class="mr-1 text-center bg" style="width: 50px;height: 40px;border-radius: 5px">
											<i class="fa fa-id-card-o text-white" aria-hidden="true" style="font-size: 130%;line-height: 39px"></i>
										</div>
										<input type="number" class="form-control" name="passport" required>
									</div>
									<label class="font-weight-bold">Fullname</label>
									<div class="mb-1" style="display: flex;">
										<div class="mr-1 text-center bg" style="width: 50px;height: 40px;border-radius: 5px">
											<i class="fa fa-user text-white" aria-hidden="true" style="font-size: 130%;line-height: 39px"></i>
										</div>
										<input type="text" class="form-control" name="name" required>
									</div>
									<label class="font-weight-bold">Address</label>
									<div class="mb-1" style="display: flex;">
										<div class="mr-1 text-center bg" style="width: 50px;height: 40px;border-radius: 5px">
											<i class="fa fa-location-arrow text-white" aria-hidden="true" style="font-size: 130%;line-height: 39px"></i>
										</div>
										<input type="text" class="form-control" name="address" required>
									</div>
									<label class="font-weight-bold">Phone</label>
									<div class="mb-1" style="display: flex;">
										<div class="mr-1 text-center bg" style="width: 50px;height: 40px;border-radius: 5px">
											<i class="fa fa-phone text-white" aria-hidden="true" style="font-size: 130%;line-height: 39px"></i>
										</div>
										<input type="number" class="form-control" name="phone" required>
									</div>
									<label class="font-weight-bold">Image</label>
									<div class="mb-1" style="display: flex;">
										<div class="mr-1 text-center" style="width: 50px;height: 50px;border: 2px dashed #ff5722;">
											<i class="fa fa-picture-o cl" aria-hidden="true" style="font-size: 130%;line-height: 47px"></i>
										</div>
										<input type="file" name="image">
									</div>
									<button class="btn bg text-white" style="width: 100%">Add New User</button>
								</form>
								
							</div>
							
							<div id="title-box-user">
								<p class="float-left font-weight-bold mb-1" style="width: 30%">Passport</p>
								<p class="float-left font-weight-bold mb-1" style="width: 45%">Name</p>
								<p class="float-left font-weight-bold mb-1" style="width: 25%">Phone</p>
								<div style="clear: both;"></div>
							</div>
							<div id="user-all-box">
								@foreach($UserList as $UserList)
								<div onclick="getUserRental('{{$UserList->name}}',{{$UserList->id}},{{$UserList->phone}},{{$UserList->passport}})">
									<p class="float-left mb-0" style="width: 30%">{{$UserList->passport}}</p>
									<p class="float-left mb-0" style="width: 45%">{{$UserList->name}}</p>
									<p class="float-left mb-0" style="width: 25%">{{$UserList->phone}}</p>
									<div style="clear: both;"></div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
					
				</div>
				

			</div>


			
			<script type="text/javascript">
				$( document ).ready(function() {
					$("#priceBook").text("{{$BookDetail->price}}".toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."))
				});
			</script>
			<script type="text/javascript">					
				$('#input-search-value').on('keyup',function(){
					var inputSearch = $(this).val();		
					var data="inputSearch=" + inputSearch;
					var result = "";
					$.ajax({
						method: "post",
						url: "{{ url('user-search') }}",
						data: data,
						success: function(data)
						{ 	
							console.log(data);
							if(data.length <1){
								$("#add-new-user").show();
								$('#user-all-box').hide();
								$('#title-box-user').hide();
							}else{
								$("#add-new-user").hide();
								$('#user-all-box').show();
								$('#title-box-user').show();
								for (var i = 0; i < data.length; i++) {
									result +=`<div onclick="getUserRental('`+data[i].name+`',`+data[i].id+`,`+data[i].phone+`,`+data[i].passport+`)">
									<p class="float-left mb-0" style="width: 30%">`+data[i].passport+`</p>
									<p class="float-left mb-0" style="width: 45%">`+data[i].name+`</p>
									<p class="float-left mb-0" style="width: 25%">`+data[i].phone+`</p>
									<div style="clear: both;"></div>
									</div>`
								}
								$('#user-all-box').html(result);
							}
						}               
					});		
				})	

				function getUserRental(name,id,phone,passport){
					$("#info-user-rental").html('<p class="text-center text-white" style="line-height: 38px"> '+passport+' - '+name+'  - '+phone+'</p>')
					$("#iduser").val(id);
				}	
			</script>
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