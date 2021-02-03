<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" ng-app="AntVel">
<head>
	@section('metaLabels')
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<base href="/">
		<meta name="description" content="">
		<meta name="author" content="">
	@show

	<link rel="icon" href="favicon.ico">
	<title>@section('title'){{ $main_company['website_name']}} @show</title>



	{{-- Antvel CSS files --}}
	{!! Html::style('/antvel-bower/bootstrap/dist/css/bootstrap.css') !!}

	@section('css')

	@show

</head>
<body>
		@include('szy.layouts.top')
<div class="wrap">
	@section('header')
		@include('szy.layouts.orders-pay-header')
	@show

	<div class="content">
		@section('content')
		@show
	</div>
</div>
@section('footer')
	@include('szy.layouts.footer')
@show


@section('scripts')
	{!! Html::script('/js/szy/jquery1.42.min.js') !!}
@show

</body>
</html>
