	<div class="header-a header-a-hover">
		<div class="header-nav">
			<div class="header-nav1">
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