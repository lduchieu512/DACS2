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
			<div style="width: 100%;">
				<div class="float-left shadow-search pl-2" style="width: 400px;height: 40px;display: flex;">
					<input id="input-search-value" type="text" name="" style="width: calc(100% - 50px);height:100%;border: 0;outline: none; ">
					<div class="bg text-center" style="width: 50px;height: 40px;">
						<i class="fa fa-search text-white" aria-hidden="true" style="font-size: 140%;line-height: 38px"></i>
					</div>
				</div>
				<a href="{{ url('book-add') }}">
					<div class="btn bg float-right mr-2 text-white">Add Book</div>
				</a>
				<div style="clear: both;"></div>
			</div>
			<script type="text/javascript">					
				$('#input-search-value').on('keyup',function(){
					var inputSearch = $(this).val();		
					var data="inputSearch=" + inputSearch;
					var result = "";
					$.ajax({
						method: "post",
						url: "{{ url('search-book') }}",
						data: data,
						success: function(data)
						{ 
							for (var i = 0; i < data.length; i++) {
								result +=`<div class="col-3 p-1 mt-2" >
								<div style="height: 140px;display: flex;">
								<a href="book-detail/`+data[i].id+`">
								<div class="sd" style="width: 85px;height: 100%;">
								<img src="../public/images/books/`+data[i].image+`" width="100%" height="100%">
								</div>
								</a>
								<div class="px-2" style="width: calc(100% - 85px);height: 100%;">
								<a href="book-detail/`+data[i].id+`" style="text-decoration: none;color: black">
								<p class="font-weight-bold mb-0" style="height: 48px;overflow-y: hidden;">`+data[i].name+`</p>
								</a>
								<p  style="font-size: 90%">`+data[i].namecategory+`</p>
								<div style="display: flex;">
								<div style="width: 70%;height: 3px;background: #17b4bb"></div>
								<p class="ml-2 mb-2" style="margin-top:-12px">`+data[i].total_rental+`</p>
								</div>
								<p class="float-left cl font-weight-bold">Remain: `+data[i].quanlity+`</p>
								<div class="bg float-right" style="border-radius: 15px;width: 30px;height: 30px"><p class="text-center text-white font-weight-bold" style="line-height: 28px">+</p></div>
								<div style="clear: both;"></div>
								</div>
								</div>
								</div>`
							}
							$('#book-all-box').html(result);
						}               
					});		
				})		
			</script>
			<div class="mt-3" style="height: calc(100vh - 80px);overflow-y: auto">
				@include('partials.book-all')

			</div>
		</div>
		<div class="p-3" style="width: 300px;height: calc(100vh - 70px);border:3px solid #f7f8fa;">
			@include('partials.home-info-admin')
			@include('partials.home-analytics')
			@include('partials.home-feature-admin')
			
		</div>
	</div>
</div>
@endsection