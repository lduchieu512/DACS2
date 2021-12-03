<a href="{{url('book')}}">
	<div class="mt-2 float-left pl-2 pt-1" style="width: 48.5%;height: 60px;background: #57d8a9;border-radius: 10px">
		<p class="font-weight-bold text-white mb-0" style="font-size: 90%">Total Book</p>
		<p id="totalBook" class="font-weight-bold text-white" style="font-size: 130%"></p>
	</div>
</a>
<a href="{{url('user-manage')}}">
	<div class="mt-2 float-right  pl-2 pt-1" style="width: 48.5%;height: 60px;background: #ff7300;border-radius: 10px">
		<p class="font-weight-bold text-white mb-0" style="font-size: 90%">Total User</p>
		<p id="totalUser" class="font-weight-bold text-white" style="font-size: 130%"></p>
	</div>
</a>
<a href="{{url('rental-manage/all')}}">
	<div class="mt-2 float-left pl-2 pt-1" style="width: 48.5%;height: 60px;background: #57d8a9;border-radius: 10px">
		<p class="font-weight-bold text-white mb-0" style="font-size: 90%">Total Rental</p>
		<p id="TotalRental" class="font-weight-bold text-white" style="font-size: 130%"></p>
	</div>
</a>
<div class="mt-2 float-right  pl-2 pt-1" style="width: 48.5%;height: 60px;background: #ff7300;border-radius: 10px">
	<p class="font-weight-bold text-white mb-0" style="font-size: 90%">Total Return</p>
	<p id="TotalReturn" class="font-weight-bold text-white" style="font-size: 130%"></p>
</div>
<a href="{{url('rental-manage/rentaling')}}">
	<div class="mt-2 float-left pl-2 pt-1" style="width: 48.5%;height: 60px;background: #57d8a9;border-radius: 10px">
		<p class="font-weight-bold text-white mb-0" style="font-size: 90%">Renting</p>
		<p id="TotalRentaling" class="font-weight-bold text-white" style="font-size: 130%"></p>
	</div>
</a>
<a href="{{url('rental-manage/outdate')}}">
	<div class="mt-2 float-right  pl-2 pt-1" style="width: 48.5%;height: 60px;background: #ff7300;border-radius: 10px">
		<p class="font-weight-bold text-white mb-0" style="font-size: 90%">Out Date</p>
		<p id="TotalOutOfDate" class="font-weight-bold text-white" style="font-size: 130%">{{$TotalOutOfDate}}</p>
	</div>
</a>
<script type="text/javascript">
	$( document ).ready(function() {
		$("#totalBook").text("{{$TotalBook}}".toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."))
		$("#totalUser").text("{{$TotalUser}}".toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."))
		$("#TotalRental").text("{{$TotalRental->value}}".toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."))
		$("#TotalReturn").text("{{$TotalReturn->value}}".toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."))
		$("#TotalRentaling").text("{{$TotalRentaling}}".toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."))
		$("#TotalOutOfDate").text("{{$TotalOutOfDate}}".toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."))
	});
	
	
</script>