@extends('Layout.master')
@section('Content')
<div class="container-fluid p-0">		
	<div style="display: flex;">
		<div class="pl-5 pt-2" style="width: calc(100% - 300px);">
			<div style="height: calc(100vh - 20px);overflow-y: auto">
				@include('partials.home-book-new')
				@include('partials.home-book-top-rental')
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