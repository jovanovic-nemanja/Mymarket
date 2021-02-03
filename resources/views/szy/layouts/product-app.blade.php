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
	{!! Html::style('/css/app.css') !!}

	@section('css')

	@show

</head>
<body>


@section('celerity')
	@include('szy.layouts.celerity')
@show

@section('header')
	@include('szy.layouts.list-header')
@show

@section('content')

@show


@section('footer')
	@include('szy.layouts.footer')
@show

</body>
@section('scripts')
	{!! Html::script('/js/szy/jquery-1.8.3.min.js') !!}
@show
</html>
