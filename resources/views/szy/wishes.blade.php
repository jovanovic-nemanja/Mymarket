@extends('szy.layouts.wishes-app')

@section('title')
	我家菜市 - 我的关注
@stop


@section('css')
	{!! Html::style('/css/szy/wishes-product.css') !!}
@stop

@section('content')
	<div class="attent-list">
		<div class="th-chk">
			<div class="select">
				<input type="checkbox" name="select_all" value="true">
				<span>全选</span>

			</div>
			<div class="operate">
				<ul>
					<li><a href="">加入购物车</a></li>
					<li><a href="">取消关注</a></li>
				</ul>
			</div>
			<div class="pages">
				<em>1</em>
				<span>/2</span>
				<button class="prev"></button>
				<button class="pages-next">下一页</button>
			</div>
		</div>
		<div class="tr-goods">
			<div class="goods-detail">
				<img src="images/goods.png" alt="">
				<div class="goods-select">
					<input type="checkbox" name="select_all" value="true">
					<span>莱阳雪梨山东黄金梨子好梨子雪梨复试梨</span>
				</div>
				<div class="goods-price">
					<span>￥43.90</span>
					<span>55.00</span>
				</div>
				<div class="goods-evaluate">
					<div class="evaluate-sum">
						<span>评价</span>
						<span>1043</span>
					</div>
					<div class="praise-sum">
						<span>评价度</span>
						<span>99%</span>
					</div>
				</div>
				<div class="goods-btn">
					<button class="buy">立即购买</button>
					<button class="add-cart">加入购物车</button>
					<button class="call-off">取消关注</button>
				</div>
			</div>
			<div class="goods-detail">
				<img src="images/goods.png" alt="">
				<div class="goods-select">
					<input type="checkbox" name="select_all" value="true">
					<span>莱阳雪梨山东黄金梨子好梨子雪梨复试梨</span>
				</div>
				<div class="goods-price">
					<span>￥43.90</span>
					<span>55.00</span>
				</div>
				<div class="goods-evaluate">
					<div class="evaluate-sum">
						<span>评价</span>
						<span>1043</span>
					</div>
					<div class="praise-sum">
						<span>评价度</span>
						<span>99%</span>
					</div>
				</div>
				<div class="goods-btn">
					<button class="buy">立即购买</button>
					<button class="add-cart">加入购物车</button>
					<button class="call-off">取消关注</button>
				</div>
			</div>
			<div class="goods-detail">
				<img src="images/goods.png" alt="">
				<div class="goods-select">
					<input type="checkbox" name="select_all" value="true">
					<span>莱阳雪梨山东黄金梨子好梨子雪梨复试梨</span>
				</div>
				<div class="goods-price">
					<span>￥43.90</span>
					<span>55.00</span>
				</div>
				<div class="goods-evaluate">
					<div class="evaluate-sum">
						<span>评价</span>
						<span>1043</span>
					</div>
					<div class="praise-sum">
						<span>评价度</span>
						<span>99%</span>
					</div>
				</div>
				<div class="goods-btn">
					<button class="buy">立即购买</button>
					<button class="add-cart">加入购物车</button>
					<button class="call-off">取消关注</button>
				</div>
			</div>
			<div class="goods-detail">
				<img src="images/goods.png" alt="">
				<div class="goods-select">
					<input type="checkbox" name="select_all" value="true">
					<span>莱阳雪梨山东黄金梨子好梨子雪梨复试梨</span>
				</div>
				<div class="goods-price">
					<span>￥43.90</span>
					<span>55.00</span>
				</div>
				<div class="goods-evaluate">
					<div class="evaluate-sum">
						<span>评价</span>
						<span>1043</span>
					</div>
					<div class="praise-sum">
						<span>评价度</span>
						<span>99%</span>
					</div>
				</div>
				<div class="goods-btn">
					<button class="buy">立即购买</button>
					<button class="add-cart">加入购物车</button>
					<button class="call-off">取消关注</button>
				</div>
			</div>
			<div class="goods-detail">
				<img src="images/goods.png" alt="">
				<div class="goods-select">
					<input type="checkbox" name="select_all" value="true">
					<span>莱阳雪梨山东黄金梨子好梨子雪梨复试梨</span>
				</div>
				<div class="goods-price">
					<span>￥43.90</span>
					<span>55.00</span>
				</div>
				<div class="goods-evaluate">
					<div class="evaluate-sum">
						<span>评价</span>
						<span>1043</span>
					</div>
					<div class="praise-sum">
						<span>评价度</span>
						<span>99%</span>
					</div>
				</div>
				<div class="goods-btn">
					<button class="buy">立即购买</button>
					<button class="add-cart">加入购物车</button>
					<button class="call-off">取消关注</button>
				</div>
			</div>
			<div class="goods-detail">
				<img src="images/goods.png" alt="">
				<div class="goods-select">
					<input type="checkbox" name="select_all" value="true">
					<span>莱阳雪梨山东黄金梨子好梨子雪梨复试梨</span>
				</div>
				<div class="goods-price">
					<span>￥43.90</span>
					<span>55.00</span>
				</div>
				<div class="goods-evaluate">
					<div class="evaluate-sum">
						<span>评价</span>
						<span>1043</span>
					</div>
					<div class="praise-sum">
						<span>评价度</span>
						<span>99%</span>
					</div>
				</div>
				<div class="goods-btn">
					<button class="buy">立即购买</button>
					<button class="add-cart">加入购物车</button>
					<button class="call-off">取消关注</button>
				</div>
			</div>
			<div class="goods-detail">
				<img src="images/goods.png" alt="">
				<div class="goods-select">
					<input type="checkbox" name="select_all" value="true">
					<span>莱阳雪梨山东黄金梨子好梨子雪梨复试梨</span>
				</div>
				<div class="goods-price">
					<span>￥43.90</span>
					<span>55.00</span>
				</div>
				<div class="goods-evaluate">
					<div class="evaluate-sum">
						<span>评价</span>
						<span>1043</span>
					</div>
					<div class="praise-sum">
						<span>评价度</span>
						<span>99%</span>
					</div>
				</div>
				<div class="goods-btn">
					<button class="buy">立即购买</button>
					<button class="add-cart">加入购物车</button>
					<button class="call-off">取消关注</button>
				</div>
			</div>
			<div class="goods-detail">
				<img src="images/goods.png" alt="">
				<div class="goods-select">
					<input type="checkbox" name="select_all" value="true">
					<span>莱阳雪梨山东黄金梨子好梨子雪梨复试梨</span>
				</div>
				<div class="goods-price">
					<span>￥43.90</span>
					<span>55.00</span>
				</div>
				<div class="goods-evaluate">
					<div class="evaluate-sum">
						<span>评价</span>
						<span>1043</span>
					</div>
					<div class="praise-sum">
						<span>评价度</span>
						<span>99%</span>
					</div>
				</div>
				<div class="goods-btn">
					<button class="buy">立即购买</button>
					<button class="add-cart">加入购物车</button>
					<button class="call-off">取消关注</button>
				</div>
			</div>
			<div class="goods-detail">
				<img src="images/goods.png" alt="">
				<div class="goods-select">
					<input type="checkbox" name="select_all" value="true">
					<span>莱阳雪梨山东黄金梨子好梨子雪梨复试梨</span>
				</div>
				<div class="goods-price">
					<span>￥43.90</span>
					<span>55.00</span>
				</div>
				<div class="goods-evaluate">
					<div class="evaluate-sum">
						<span>评价</span>
						<span>1043</span>
					</div>
					<div class="praise-sum">
						<span>评价度</span>
						<span>99%</span>
					</div>
				</div>
				<div class="goods-btn">
					<button class="buy">立即购买</button>
					<button class="add-cart">加入购物车</button>
					<button class="call-off">取消关注</button>
				</div>
			</div>
			<div class="goods-detail">
				<img src="images/goods.png" alt="">
				<div class="goods-select">
					<input type="checkbox" name="select_all" value="true">
					<span>莱阳雪梨山东黄金梨子好梨子雪梨复试梨</span>
				</div>
				<div class="goods-price">
					<span>￥43.90</span>
					<span>55.00</span>
				</div>
				<div class="goods-evaluate">
					<div class="evaluate-sum">
						<span>评价</span>
						<span>1043</span>
					</div>
					<div class="praise-sum">
						<span>评价度</span>
						<span>99%</span>
					</div>
				</div>
				<div class="goods-btn">
					<button class="buy">立即购买</button>
					<button class="add-cart">加入购物车</button>
					<button class="call-off">取消关注</button>
				</div>
			</div>
			<div class="goods-detail">
				<img src="images/goods.png" alt="">
				<div class="goods-select">
					<input type="checkbox" name="select_all" value="true">
					<span>莱阳雪梨山东黄金梨子好梨子雪梨复试梨</span>
				</div>
				<div class="goods-price">
					<span>￥43.90</span>
					<span>55.00</span>
				</div>
				<div class="goods-evaluate">
					<div class="evaluate-sum">
						<span>评价</span>
						<span>1043</span>
					</div>
					<div class="praise-sum">
						<span>评价度</span>
						<span>99%</span>
					</div>
				</div>
				<div class="goods-btn">
					<button class="buy">立即购买</button>
					<button class="add-cart">加入购物车</button>
					<button class="call-off">取消关注</button>
				</div>
			</div>
		</div>
		<div class="table-foot">
			<div class="select">
				<input type="checkbox" name="select_all" value="true">
				<span>全选</span>

			</div>
			<div class="operate">
				<ul>
					<li><a href="">加入购物车</a></li>
					<li><a href="">取消关注</a></li>
				</ul>
			</div>
			<div class="pages">
				<ul class="items">
					<li class="item_prev">
						<a href="#">
							<span class="icons"></span>
							<span class="prev">上一页</span>
						</a>
					</li>
					<li class="item"><span class="num">1</span></li>
					<li class="item"><a href="#">2</a></li>
					<li class="item_next">
						<a href="">
							<span class="next">下一页</span>
							<span class="icons"></span>
						</a>
					</li>
				</ul>
				<div class="total_page">共2页</div>
				<div class="form">
					<span class="text">到第</span>
					<input type="text" value="2">
					<span class="text">页</span>
					<span class="btn">确定</span>
				</div>
			</div>
		</div>
	</div>
@stop

@section('scripts')
	@parent
	<script type="text/javascript">
		jQuery(".slideBox").slide({mainCell:".bd ul",effect:"leftLoop",autoPlay:true});

		//网站 商品搜索跳转
		function search(){
			window.location.href="products?search="+$("#text_search").val(); 
		}
	</script>
@show




