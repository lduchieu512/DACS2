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
					<a href="{{ url('user-add') }}">
						<div class="bg float-right btn text-white" style="height: 40px">Add User</div>
					</a>
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
					<p class="ml-2 mb-0 font-weight-bold line_1" style="width: 10%;">Passport</p>
					<p class="ml-2 mb-0 font-weight-bold line_1 " style="width: 18%;">Name</p>
					<p class="ml-2 mb-0 font-weight-bold line_1" style="width:20%;">Address</p>
					
					<p class="ml-2 mb-0 font-weight-bold line_1 text-center" style="width:8%;">Rental</p>
					<p class="ml-2 mb-0 font-weight-bold line_1 text-center" style="width: 8%;">Return</p>
					<p class="ml-2 mb-0 font-weight-bold line_1 text-center" style="width: 8%;">Out date</p>
					<p class="ml-2 mb-0 font-weight-bold line_1 text-center" style="width: 10%;">List Story</p>
					<p class="ml-2 mb-0 font-weight-bold line_1 text-center" style="width: 15%;">Method</p>
				</div>
				<div data-spy="scroll" data-target="#myScrollspy" data-offset="10"
				style="height: calc(100vh - 150px);overflow-y: scroll;min-width: 1000px;overflow-x: scroll;">
				<div id="user-all-box">
					@foreach($User as $User)
					<div id="box-user{{$User->id}}" class="shadow-ok mt-1 pt-2" style="width: 100%;background: #fff;border-radius: 10px;height: 50px;display: flex;">
						<p class="ml-2 mb-0 line_1" style="width: 3%;font-size: 90%">#{{$User->id}}</p>
						<p class="ml-2 mb-0  line_1" style="width: 10%;font-size: 90%">{{$User->passport}}</p>
						<p class="ml-2 mb-0  line_1 " style="width: 18%;font-size: 90%">{{$User->name}}</p>
						<p class="ml-2 mb-0  line_1" style="width:20%;font-size: 90%">{{$User->address}}</p>
						
						<p class="ml-2 mb-0  line_1 text-center" style="width:8%;font-size: 90%">130</p>
						<p class="ml-2 mb-0 line_1 text-center" style="width: 8%;font-size: 90%">120</p>
						<p class="ml-2 mb-0  line_1 text-center" style="width: 8%;font-size: 90%">2</p>
						<p class="ml-2 mb-0  line_1 text-center" style="width: 10%;font-size: 90%">See</p>
						<div class="ml-2 mb-0  line_1 " style="width: 15%;font-size: 90%">
							<a href="{{ url('user-edit/'.$User->id) }}">
								<button class="btn bg text-white">Edit</button>
							</a>
							<button class="btn bg text-white" onclick="DeleteUser({{$User->id}})">Delete</button>
						</div>
					</div>
					@endforeach
				</div>

			</div>
			<div style="clear: both;"></div>
		</div>


	</div>
	<script type="text/javascript">
		function DeleteUser(id){
			var data="id=" + id;
			$.ajax({
				method: "post",
				url: "{{ url('user-delete') }}",
				data: data,
				success: function(data)
				{ 
					$("#box-user"+data).hide();
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
				url: "{{ url('user-search') }}",
				data: data,
				success: function(data)
				{ 
					console.log(data);
					for (var i = 0; i < data.length; i++) {
						result +=`<div id="box-user`+data[i].id+`" class="shadow-ok mt-1 pt-2" style="width: 100%;background: #fff;border-radius: 10px;height: 50px;display: flex;">
						<p class="ml-2 mb-0 line_1" style="width: 3%;font-size: 90%">#`+data[i].id+`</p>
						<p class="ml-2 mb-0  line_1" style="width: 10%;font-size: 90%">`+data[i].passport+`</p>
						<p class="ml-2 mb-0  line_1 " style="width: 18%;font-size: 90%">`+data[i].name+`</p>
						<p class="ml-2 mb-0  line_1" style="width:20%;font-size: 90%">`+data[i].address+`</p>
						<p class="ml-2 mb-0  line_1 text-center" style="width:8%;font-size: 90%">130</p>
						<p class="ml-2 mb-0 line_1 text-center" style="width: 8%;font-size: 90%">120</p>
						<p class="ml-2 mb-0  line_1 text-center" style="width: 8%;font-size: 90%">2</p>
						<p class="ml-2 mb-0  line_1 text-center" style="width: 10%;font-size: 90%">See</p>
						<div class="ml-2 mb-0  line_1 " style="width: 15%;font-size: 90%">
						<a href="user-edit/`+data[i].id+`">
						<button class="btn bg text-white">Edit</button>
						</a>
						<button class="btn bg text-white" onclick="DeleteUser(`+data[i].id+`)">Delete</button>
						</div>
						</div>`
					}
					$('#user-all-box').html(result);
				}               
			});		
		})		
	</script>
	<div class="p-3 bg-white" style="width: 300px;height: calc(100vh - 70px);border:3px solid #f7f8fa;z-index: 9999">
		@include('partials.home-info-admin')
		@include('partials.home-analytics')
		@include('partials.home-feature-admin')
		
	</div>
</div>
</div>
@endsection