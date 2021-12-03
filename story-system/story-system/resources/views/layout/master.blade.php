<!DOCTYPE html>
<html>
<head>
	<title>{{$title}}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<script
	src="https://code.jquery.com/jquery-3.5.1.js"
	integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
	crossorigin="anonymous"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<style type="text/css">
	*{
		margin: 0;
		padding: 0;
	}	
	.bg{
		background: #ff5722;
	}
	.cl{
		color: #ff5722;
	}
	.sd{
		-webkit-box-shadow: -3px 3px 22px -9px rgba(0,0,0,0.16);
		-moz-box-shadow: -3px 3px 22px -9px rgba(0,0,0,0.16);
		box-shadow: -3px 3px 22px -9px rgba(0,0,0,0.16);
	}
	::-webkit-scrollbar-thumb {
		background-color: #ff5722;
	}
	::-webkit-scrollbar {
		width: 6px;
		height: 6px;
	}
</style>
<body>
	@yield('Content')
	<script type="text/javascript">
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});	
	</script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>