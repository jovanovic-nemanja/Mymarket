@extends('szy.layouts.shop-app')

@section('title')
我家菜市商铺 
@stop

@section('content')
<div class="content">
	<div class="ct-left">
		{{--
		<div class="l-info">
			<div class="info-top"></div>
			<div class="info-title">
				<b>供应商信息</b>
			</div><br/>
			<span>奉节继橙</span>
			<div class="info-list">
				<li><b>店&nbsp;&nbsp;&nbsp;&nbsp;铺</b>: {{$business->business_name}}</li>
				<li><b>所&nbsp;在&nbsp;地</b>:{{$business->address}}</li>
				<li><b>产品供应量</b>: <em>{{$business->business_name}}</em></li>
				<li><b>店铺访问量</b>: <em>{{$business->business_name}}</em></li>
			</div>
			<li class="info-li"><img src="/img/szy/inc/attention.png"><b> 关注店铺</b></li>
			<li class="info-li"><img src="/img/szy/inc/consult.png"><b> 咨询客服</b></li>
		</div>--}}
		<div class="l-info">
			<div class="info-top"></div>
			<div class="info-title">
				<b>联系我们</b>
			</div>
			<br/>
			<span>{{$business->person}}</span>
			<div class="info-list">
				<li><b>店 铺</b>: {{$business->business_name}}</li>
				<li><b>手 机</b>: {{$business->phone}}</li>
				<li><b>电 话</b>: {{$business->phone}}</li>
				<li><b>邮 箱</b>: {{$business->email}}</li>
				<li><b>传 真</b>: {{$business->fax}}</li>
				<li><b>地 址</b>: {{$business->address}}</li>
				<li><b>邮 编</b>: {{$business->business_name}}</li>
			</div>
		</div>
		<div class="l-suggest">
			<div class="sg-title">店家推荐</div>
			@if(!empty($pushs))
				@foreach($pushs as $push)
				<li class="sg-list">
					<div class="list-img"><a href=""><img src="{{json_decode($push->features)->{'images'}[0]}}"></a></div>
					<div class="list-title"><a href="">{{$push->name}}</a></div>
					<div class="list-money">￥ {{$push->price}}</div>
				</li>
				@endforeach
			@else
			<li>无</li>
			@endif		
		</div>
	</div>

	<div class="ct-right">
		<div class="r-desc">
			<div class="desc-bg"></div>
			<div class="desc-text"><br>
				<span>商铺简介:</span>
				<div class="text">{{$business->referral}}</div>
			</div>
		</div>

		<div class="product-title"><b>|</b> 所有商品</div>
		<div class="product-order" id="order_product">
			<li @if($order=='all')class="active" ade="{{$ade}}" @endif val='all'>综合排序
				@if($order=='all') @if($ade=='desc')<span class="jt-footer">@else <span class="jt-top"> @endif @endif</span>
			</li>
			<li @if($order=='sell')class="active" ade="{{$ade}}"@else ade="asc" @endif val='sell'>销量 
				@if($order=='sell') @if($ade=='desc')<span class="jt-footer">@else <span class="jt-top"> @endif @endif</span>
			</li>
			<li @if($order=='price')class="active" ade="{{$ade}}"@else ade="asc"@endif val='price'>价格
				@if($order=='price') @if($ade=='desc')<span class="jt-footer">@else <span class="jt-top"> @endif @endif</span>
			</li>
			<li @if($order=='date')class="active" ade="{{$ade}}"@else ade="asc"@endif val='date'>发布时间
				@if($order=='date') @if($ade=='desc')<span class="jt-footer">@else <span class="jt-top"> @endif @endif</span>
			</li>
		</div>
		<div class="product-list">
			@if(!empty($products)) 
				@foreach($products as $product)
				<div class="list-single">
					<div class="sin-img"><a href=""><img src="{{json_decode($product->features)->{'images'}[0]}}"></a></div>
					<div class="sin-money"><b>￥ {{$product->price}}</b>{{--9.00/kg--}} </div>
					<a href="" title="{{$product->name}}"><div class="sin-title"><b>{{$product->name}}</b></div></a>
					<div class="sin-sell">

						{{--
						<li>月成交<b>189</b>笔</li>
						<li>评价 <b>158</b></li>
						--}}

					    <form action="user/orders/addTo/cart/{{$product->id}}" method="POST">
                            <input name="_method" type="hidden" value="PUT">
                            {{ csrf_field() }}
                            <input type="submit" style="display:none" id="cart_submit">
                        </form>
						<li onclick="$('input[id=cart_submit]').click();">加入购物车</li>
						<a href="products/{{$product->id}}"><li>查看商品</li></a>
					</div>
				</div>
				@endforeach
			@else
				<div>该店铺无商品</div>
			@endif
		</div>
	</div>
	<div class="page">
		<div class="center">
			{!! $products->appends(['search' => old('search'),'order' => old('order'),'ade' => old('ade')])->links()!!}
		</div>
	</div>
</div>
@stop

@section('scripts')
@parent
<script type="text/javascript">
	jQuery(".slideBox").slide({mainCell:".bd ul",effect:"leftLoop",autoPlay:true});

	//排序搜索
	$("#order_product li").click(function(){
		var order = $(this).attr('val');
		var ade = $(this).attr('ade');
		if (ade=='desc') {
			ade = 'asc';
		}else{
			ade = 'desc';
		}
		window.location.href="{{url('')}}"+window.location.pathname+"?search="+$('#text_search').val()+"&order="+order+"&ade="+ade; 
	});

	//网站 商品搜索跳转
	function search(){
		window.location.href="products?search="+$("#text_search").val(); 
	}

	//商铺 商品搜索跳转
	function search2(){
		window.location.href="{{url('')}}"+window.location.pathname+"?search="+$('#text_search').val(); 
	}
</script>
@show