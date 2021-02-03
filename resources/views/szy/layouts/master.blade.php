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
		{!! Html::style('/css/szy/index.css') !!}
	@show

</head>
<body>

@section('celerity')
	@include('szy.layouts.celerity')
@show

@section('header')
	@include('szy.layouts.header')
@show


@section('content')

@show


@section('footer')

	@include('szy.layouts.footer')

@show


@section('scripts')
	{!! Html::script('/antvel-bower/bootstrap/dist/js/bootstrap.min.js') !!}
	{!! Html::script('/js/szy/jquery1.42.min.js') !!}
	{!! Html::script('/js/szy/jquery.SuperSlide.2.1.1.js') !!}
@show

</body>
</html>
