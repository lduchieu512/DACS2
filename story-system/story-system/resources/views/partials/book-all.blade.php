<div id="book-all-box" class="row m-0">
	@foreach($Book as $Book)
	<div class="col-3 p-1 mt-2" >
		<div style="height: 140px;display: flex;">
			<a href="{{ url('book-detail/'.$Book->id) }}">
				<div class="sd" style="width: 85px;height: 100%;">
					<img src="../public/images/books/{{$Book->image}}" width="100%" height="100%">
				</div>
			</a>
			<div class="px-2" style="width: calc(100% - 85px);height: 100%;">
				<a href="{{ url('book-detail/'.$Book->id) }}" style="text-decoration: none;color: black">
					<p class="font-weight-bold mb-0" style="height: 48px;overflow-y: hidden;">{{$Book->name}}</p>
				</a>
				<p  style="font-size: 90%">{{$Book->namecategory}}</p>
				<div style="display: flex;">
					<div style="width: 70%;height: 3px;background: #17b4bb"></div>
					<p class="ml-2 mb-2" style="margin-top:-12px">{{$Book->total_rental}}</p>
				</div>
				<p class="float-left cl font-weight-bold">Remain: {{$Book->quanlity}}</p>
				<a href="{{ url('book-rental/'.$Book->id) }}">
					<div class="bg float-right" style="border-radius: 15px;width: 30px;height: 30px"><p class="text-center text-white font-weight-bold" style="line-height: 28px">+</p></div>
				</a>
				<div style="clear: both;"></div>
			</div>
		</div>
	</div>
	@endforeach
</div>