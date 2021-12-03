<p class="font-weight-bold" style="font-size: 160%">New Book</p>
<div class="row m-0">
	@foreach($BookNew as $BookNew)
	<div class="col-3 p-1 mt-2" >
		<div style="height: 140px;display: flex;">
			<a href="{{ url('book-detail/'.$BookNew->id) }}">
				<div class="sd" style="width: 85px;height: 100%;">
					<img src="../public/images/books/{{$BookNew->image}}" width="100%" height="100%">
				</div>
			</a>
			<div class="px-2" style="width: calc(100% - 85px);height: 100%;">
				<a href="{{ url('book-detail/'.$BookNew->id) }}" style="text-decoration: none;color: black">
					<p class="font-weight-bold mb-0" style="height: 48px;overflow-y: hidden;">{{$BookNew->name}}</p>
				</a>
				<p  style="font-size: 90%">{{$BookNew->namecategory}}</p>
				<div style="display: flex;">
					<div style="width: 70%;height: 3px;background: #17b4bb"></div>
					<p class="ml-2 mb-2" style="margin-top:-12px">{{$BookNew->total_rental}}</p>
				</div>
				<p class="float-left cl font-weight-bold">Remain: {{$BookNew->quanlity}}</p>
				<a href="{{ url('book-rental/'.$BookNew->id) }}">
					<div class="bg float-right" style="border-radius: 15px;width: 30px;height: 30px">
						<p class="text-center text-white font-weight-bold" style="line-height: 28px">+</p>
					</div>
				</a>
				<div style="clear: both;"></div>
			</div>
		</div>
	</div>
	@endforeach
</div>