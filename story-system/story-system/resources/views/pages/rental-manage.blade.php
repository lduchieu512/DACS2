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
					<p class="font-weight-bold" style="font-size: 130%">User Manage</p>
				</div>
				<div class="col-10">
					<div class="dropdown float-right mr-2 ">
						<button class="btn bg dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Filter
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="{{url('rental-manage/all')}}">All</a>
							<a class="dropdown-item" href="{{url('rental-manage/rentaling')}}">Rentaling</a>
							<a class="dropdown-item" href="{{url('rental-manage/outdate')}}">Out Date</a>
						</div>
					</div>
					<div class="float-right shadow-search mr-2 pl-2" style="width: 300px;height: 40px;background: white;display: flex;">
						<input id="input-search-value" type="text" name="" style="width: calc(100% - 50px);height:100%;border: 0;outline: none; ">
						<div class="bg text-center" style="width: 50px;height: 40px;">
							<i class="fa fa-search text-white" aria-hidden="true" style="font-size: 140%;line-height: 38px"></i>
						</div>
					</div>
					
				</div>
			</div>
			<div class="m-0 p-3 row">
				<style type="text/css">
					.shadow-ok{
						-webkit-box-shadow: 9px 14px 25px -22px rgba(104,215,7,0.27);
						-moz-box-shadow: 9px 14px 25px -22px rgba(104,215,7,0.27);
						box-shadow: 9px 14px 25px -22px rgba(104,215,7,0.27);
					}
				</style>
				<div style="display: flex;width: 100%">
					<p class="ml-2 mb-0 font-weight-bold line_1" style="width: 3%;">ID</p>
					<p class="ml-2 mb-0 font-weight-bold line_1" style="width: 40%;">Info Book</p>
					<p class="ml-2 mb-0 font-weight-bold line_1" style="width: 37%;">Info User Rental</p>
					<p class="ml-2 mb-0 font-weight-bold line_1" style="width: 20%;">Method</p>
				</div>
				<div data-spy="scroll" data-target="#myScrollspy" data-offset="10"
				style="height: calc(100vh - 120px);overflow-y: scroll;min-width: 1000px;overflow-x: scroll;">
				<div id="rental-all-box">
					


					@foreach($RentalList as $RentalList)
					<div id="box-book-rental{{$RentalList->id}}" class="shadow-ok mt-1 pt-2" style="width: 100%;background: #fff;border-radius: 10px;display: flex;">
						<div style="width: 40%;height: 140px;">
							<div class="float-left mr-2" style="width: 100px;height: 140px;">
								<a href="{{url('book-detail/'.$RentalList->idbook)}}">
									<img src="../../public/images/books/{{$RentalList->image}}" width="100%" height="100%">
								</a>
							</div>
							<div class="float-left" >
								<p class="mb-0 font-weight-bold mt-2" style="font-size: 105%;width: 250px">{{$RentalList->namebook}}</p>
								<p class="mb-0" style="font-size: 90%;">Status: Good - Approve by {{$RentalList->username}}</p>
								<p class="cl" style="font-size: 90%;width: 250px;">Note: {{$RentalList->note}}</p>
								

							</div >
							
						</div>
						<div class="p-2" style="width: 37%;height: 140px;">
							<p class="mb-1" ><i class="fa fa-user mr-2 cl" aria-hidden="true" style="width: 20px"></i>name: {{$RentalList->nameuser}}</p>
							<p class="mb-1"><i class="fa fa-id-card-o mr-2 cl " aria-hidden="true" style="width: 20px"></i>Passport: {{$RentalList->passport}}</p>
							<p class="mb-1" ><i class="fa fa-phone mr-2 cl" aria-hidden="true" style="width: 20px"></i>Phone: {{$RentalList->phone}}</p>
							<p class="mb-1" ><i class="fa fa-location-arrow mr-2 cl" aria-hidden="true" style="width: 20px"></i>Address: {{$RentalList->address}}</p>
						</div>
						<div style="width: 20%;height: 140px;">
							@if($RentalList->active == 1)
							<div class="btn bg text-white" onclick="BookRenewal({{$RentalList->id}})">Renewal</div>
							<div class="btn bg text-white" onclick="BookReturn({{$RentalList->id}},{{$RentalList->idbook}})">Return</div>
							<input id="renewal-input{{$RentalList->id}}" type="date" class="form-control mt-1 float-left" style="display: none;width: 70%" data-date-format="DD MM YYYY">
							<div id="renewal-button{{$RentalList->id}}" class="btn bg float-right mt-1 text-white" style="display: none;" onclick="BookChangeDate({{$RentalList->id}})">Ok</div>
							<div class="mt-1" style="clear: both;"></div>
							<span class="badge rounded-pill bg float-left mr-2 mt-1">
								<i class="fa fa-calendar-minus-o text-white "  aria-hidden="true"></i>
							</span>
							<p class="mb-0 font-weight-bold cl float-left mt-1" style="font-size: 90%">From {{date('d/m/Y', strtotime($RentalList->from_date))}}</p>
							<div style="clear: both;"></div>
							<span class="badge rounded-pill bg float-left mr-2 mt-1">
								<i class="fa fa-calendar-plus-o text-white "  aria-hidden="true"></i>
							</span>
							<p id="to-date-text{{$RentalList->id}}" class="mb-0 font-weight-bold cl float-left mt-1" style="font-size: 90%">To {{date('d/m/Y', strtotime($RentalList->to_date))}}</p>
							<div style="clear: both;"></div>
							
							@else
							<p>Finish</p>
							@endif
						</div>
					</div>
					@endforeach

					<script type="text/javascript">
						function BookReturn(id,idbook){
							var data="id=" + id + "&idbook="+idbook;
							$.ajax({
								method: "post",
								url: "{{ url('book-return') }}",
								data: data,
								success: function(data)
								{ 
									$("#box-book-rental"+data).hide();
								}               
							});  
						}

						var idRenewal;
						var dateRenewal;
						function BookRenewal(id){
							idRenewal =id;
							var dateRenewal = $("#renewal-input"+id).val();
							$("#renewal-input"+id).show();
							$("#renewal-button"+id).show();
						}

						function BookChangeDate(id){
							dateRenewal = $("#renewal-input"+id).val();
							var data="id=" + id +"&date="+dateRenewal;
							$.ajax({
								method: "post",
								url: "{{ url('book-renewal') }}",
								data: data,
								success: function(data)
								{ 
									$("#to-date-text"+data).text('To '+dateRenewal);
								}               
							});
						}
						
					</script>
					<script type="text/javascript">					
						$('#input-search-value').on('keyup',function(){
							var inputSearch = $(this).val();		
							var data="inputSearch=" + inputSearch;
							var result = "";
							$.ajax({
								method: "post",
								url: "{{ url('rental-search') }}",
								data: data,
								success: function(data)
								{ 	
									console.log(data);
									for (var i = 0; i < data.length; i++) {

										var date1 = new Date(data[i].to_date);
										var to_date = ((date1.getDate() > 9) ? date1.getDate() : ('0' + date1.getDate())) + '/' + ((date1.getMonth() > 8) ? (date1.getMonth() + 1) : ('0' + (date1.getMonth() + 1))) + '/' + date1.getFullYear();

										var date2 = new Date(data[i].from_date);
										var from_date = ((date2.getDate() > 9) ? date2.getDate() : ('0' + date2.getDate())) + '/' + ((date2.getMonth() > 8) ? (date2.getMonth() + 1) : ('0' + (date2.getMonth() + 1))) + '/' + date2.getFullYear();
										var active;
										if(data[i].active == 1){
											active =`<div class="btn bg text-white" onclick="BookRenewal(`+data[i].id+`)">Renewal</div>
											<div class="btn bg text-white" onclick="BookReturn(`+data[i].id+`,`+data[i].idbook+`)">Return</div>
											<input id="renewal-input`+data[i].id+`" type="date" class="form-control mt-1 float-left" style="display: none;width: 70%">
											<div id="renewal-button`+data[i].id+`" class="btn bg float-right mt-1 text-white" style="display: none;" onclick="BookChangeDate(`+data[i].id+`)">Ok</div>
											<div class="mt-1" style="clear: both;"></div>
											<span class="badge rounded-pill bg float-left mr-2 mt-1">
											<i class="fa fa-calendar-minus-o text-white "  aria-hidden="true"></i>
											</span>
											<p class="mb-0 font-weight-bold cl float-left mt-1" style="font-size: 90%">From `+from_date+`</p>
											<div style="clear: both;"></div>
											<span class="badge rounded-pill bg float-left mr-2 mt-1">
											<i class="fa fa-calendar-plus-o text-white "  aria-hidden="true"></i>
											</span>
											<p id="to-date-text`+data[i].id+`" class="mb-0 font-weight-bold cl float-left mt-1" style="font-size: 90%">To `+to_date+`</p>
											<div style="clear: both;"></div>`;
										}else{
											active=`<p>Finish</p>`
										}
										result +=`<div id="box-book-rental`+data[i].id+`" class="shadow-ok mt-1 pt-2" style="width: 100%;background: #fff;border-radius: 10px;display: flex;">
										<div style="width: 40%;height: 140px;">
										<div class="float-left mr-2" style="width: 100px;height: 140px;">
										<a href="book-detail/`+data[i].idbook+`">
										<img src="../../public/images/books/`+data[i].image+`" width="100%" height="100%">
										</a>
										</div>
										<div class="float-left" >
										<p class="mb-0 font-weight-bold mt-2" style="font-size: 105%;width: 250px">`+data[i].namebook+`</p>
										<p class="mb-0" style="font-size: 90%;">Status: Good - Approve by `+data[i].username+`</p>
										<p class="cl" style="font-size: 90%;width: 250px;">Note: `+data[i].note+`</p>


										</div >

										</div>
										<div class="p-2" style="width: 37%;height: 140px;">
										<p class="mb-1" ><i class="fa fa-user mr-2 cl" aria-hidden="true" style="width: 20px"></i>name: `+data[i].nameuser+`</p>
										<p class="mb-1"><i class="fa fa-id-card-o mr-2 cl " aria-hidden="true" style="width: 20px"></i>Passport: `+data[i].passport+`</p>
										<p class="mb-1" ><i class="fa fa-phone mr-2 cl" aria-hidden="true" style="width: 20px"></i>Phone: `+data[i].phone+`</p>
										<p class="mb-1" ><i class="fa fa-location-arrow mr-2 cl" aria-hidden="true" style="width: 20px"></i>Address: `+data[i].address+`</p>
										</div>
										<div style="width: 20%;height: 140px;">
										
										`+active+`

										</div>
										</div>`;
									}
									$('#rental-all-box').html(result);
								}               
							});		
						})		
					</script>

					
				</div>

			</div>
			<div style="clear: both;"></div>
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