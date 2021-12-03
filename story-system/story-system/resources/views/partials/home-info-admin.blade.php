<div class="float-left" style="width: 60px;height: 60px;">
	<img src="/story-system/public/images/avatars/{{$AdminInfo->image}}" width="100%" height="100%" style="border-radius: 20px">
</div>
<div class="float-right px-2 mb-2" style="width: calc(100% - 60px);height: 60px;">
	<p class="font-weight-bold mb-0" style="font-size: 110%">{{$AdminInfo->username}}</p>
	<p class="mb-0 cl">@if($AdminInfo->role ==1) admin @endif</p>
</div>
<div style="clear: both;"></div>