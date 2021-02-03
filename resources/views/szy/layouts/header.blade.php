
<div class="header">
	<div class="header-a">
		<div class="header-nav">
			<div class="header-nav1" name="top">
				<a href="{{url('')}}">欢迎光临我家菜市</a>&nbsp;

				@if (auth()->check())
					<a href="user/profile">{{auth::user()->nickname}}</a>&nbsp;
					<a href="javascript:void(0);" onclick="$('input[id=Logout]').click();">退出</a>
					<form action="/logout" method="POST">
						{{ csrf_field() }}
						<input type="submit" class="btn" id="Logout" style="display:none">
					</form>
				@else
				<a href="login">请 <b>登录</b></a>&nbsp;
				<a href="register">注册</a>
				@endif
			</div>
			<div class="header-nav2">
				<li><a href="user/profile">账号设置</a></li>
				<li><a href="user/address">收货地址</a>|</li>
				<li><a href="wishes">我的关注</a>|</li>
				<li><a href="user/orders">我的订单</a>|</li>
				<li><a href="user/cart">购物车</a>|</li>
				<li><a href="">我的消息</a>|</li>
				@if (auth()->check())
					@if(auth::user()->role == 'admin' || auth::user()->role == 'business')
					<li><a href="orders/usersOrders">我的销售</a>|</li>
					<li><a href="products/myProducts">我的商品</a>|</li>
					@endif

					@if(auth::user()->role == 'admin')
					<li><a href="wpanel/profile">控制面板</a>|</li>
					@endif

					@if(auth::user()->role == 'business')
					<li><a href="shop/{{auth::user()->id}}">我的商铺</a>|</li>
					@endif
				@endif
			</div>
		</div>
	</div>
	<div class="header-c">
		<div class="header-nav">
			<div class="header-nav-b">
				<div class="header-nav-b1"><a href="{{url('')}}"><img src="/img/szy/inc/logo.png"></a></div>
			</div>
			<div  class="header-nav-right">
				<div class="header-nav-right-l">

					<div class="header-nav-right-la">
						<select class="header-nav-right-la-bt1">
							<option>商品</option>
							{{--<option>商家</option>--}}
						</select>
						<input type="text" id="home_search" value="@if(isset($_GET['search'])){{$_GET['search']}}@endif">
						<button class="header-nav-right-la-bt1" onclick="search();">搜索</button>
						<div class="header-nav-right-la-cart">
							<a href="user/cart">
								<img src="/img/szy/inc/cart.png">
								我的购物车
							</a>
						</div>
					</div>

					<div class="header-nav-right-l-div">
						<b>热门搜索 :</b>
					@foreach ($labels as $label)
						<a href="products?search={{$label}}">{{$label}}</a> 
						<span>|</span>
					@endforeach 
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="header-b">
		<div class="header-nav">
			<div class="header-b-menu">
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
</div>
@section('scripts')
    @parent
<script type="text/javascript">
	
	//商品搜索跳转
	function search(){
		window.location.href="products?search="+$("#home_search").val(); 
	}

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