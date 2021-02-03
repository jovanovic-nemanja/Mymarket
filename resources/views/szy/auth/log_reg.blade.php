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
	<title>@section('title') @show</title>

	@section('css')
		{!! Html::style('/css/szy/login.css') !!}
	@show

</head>
<body>
 <div class="login">
 	<div class="l-title">
 		<div class="center">
	 		<div class="left"><a href="{{url('')}}"><img src="/img/szy/inc/dp-logo.png"></a></div>
	 		<div class="right">
	 			<li><img src="/img/szy/inc/baozhang.png"><span><b>100%正品保证</b></span></li>
	 			<li><img src="/img/szy/inc/qitian.png"><span><b>七天无理由退款</b></span></li>
	 			<li><img src="/img/szy/inc/yunshu.png"><span><b>退货返运费</b></span></li>
	 		</div>
 		</div>
 	</div>
 	<div class='content'>
 		<div class="operate">
 			<div class="center">
 				
 				@section('content')

				@show
 			</div>
 		</div>
 	</div>
 	<div class="footer">
 		&copy;版权所有2016-2020广州生之源信息技术有限公司 粤ICP备12570346
 	</div>
 </div>

@section('scripts')

@show
</body>
</html>





