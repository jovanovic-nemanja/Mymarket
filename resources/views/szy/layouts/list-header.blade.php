
@include('szy.layouts.top')
	<div class="top">
		<a href="{{url('')}}"><img src="img/szy/inc/logo2.png" alt="" class="logo"></a>
		<div class="search">
			<input type="text" id="home_search" value="@if(isset($_GET['search'])){{$_GET['search']}}@endif">
			<button type="button" onclick="search();">搜索</button>
			<ul>

			@if(!empty($sells) && isset($sells))
				@foreach($sells as $sell)
				<li class="product-list">
					<a href="">{{$sell->name}}</a>
				</li>&nbsp;
				@endforeach
			@endif
			</ul>
		</div>
		<div class="shoppingCart">
			<a href="user/cart">
			<img src="/img/szy/inc/cart.png">
			<span>我的购物车</span>
			</a>
		</div>
	</div>
	<?php 
		$navs = App\Http\Controllers\HomeController::classProduct();
	 ?>
	<div class="line">
		<div class="center">
			<div class="vegetable_sort">
				<div class="menu-title">菜市分类</div>
				<div class="menu-list">
					@foreach ($navs as $nav)
					<li>
						<div class="c-{{$nav[0]->color}}"></div>
						<div class="img"><img src="{{$nav[0]->image}}"></div>
						<div class="right">
							<div class="r-class"><a href="products?category={{$nav[0]->name}}"><b>{{$nav[0]->name}}</b></a></div>
							<div class="f-h">></div>
							<div class="x-class">@foreach ($nav[2] as $p){{$p->name}}&nbsp;@endforeach</div>
							<div class="hide-class">
								<div>
									@foreach ($nav[2] as $pro)
									<h5><a href="products?search={{$pro->name}}">{{$pro->name}}</a></h5>
									@endforeach 
								</div>
							</div>
						</div>
					</li>
					@endforeach 
				</div>
			</div>
		</div>
	</div>

@section('scripts')
    @parent
<script type="text/javascript">
	//商品搜索跳转
	function search(){
		window.location.href="products?search="+$("#home_search").val(); 
	};
	//级联菜单
	$(".menu-title").mouseover(function(){
		$(".menu-list").show();
	});
	$(".menu-list").mouseleave(function(){
		$(".menu-list").css('display','none');
	});
	$(".menu-list li").mouseover(function(){
		$(this).children('.right').children('.hide-class').show();
	}).mouseleave(function(){
		$(this).children('.right').children('.hide-class').css('display','none');
	});
</script>
@show
