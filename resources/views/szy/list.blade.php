@extends('szy.layouts.product-app')

@section('title')
我家菜市 - 商品列表页
@stop

@section('css')
	{!! Html::style('/css/szy/list.css') !!}
@stop

@section('content')


	<div class="wrap">
		<div class="main">
			<div class="mainsrp_nav">
				<div class="crumb">
				    <div id="menu-top-category" class="container">
				         <div class="row">&nbsp;</div>
				         <ol class="breadcrumb">
				            <li class="total">
				                <span class="badge">{{ $products->total() }}</span> <small> {{ trans('globals.searchResults') }} </small>
				            </li>
				            <?php $filterSelected = []; ?>
				            @foreach ($refine as $key => $value)
				                @if (trim($value)!='' && $key != 'category_name' && $key != 'page')
				                    <li>
				                        <small>
				                            <?php
				                                switch ($key)
				                                {
				                                    case 'max': $breadcrumb = trans('globals.max_price_label'); break;
				                                    case 'min': $breadcrumb = trans('globals.min_price_label'); break;
				                                    case 'category': $breadcrumb = $key; $value = $refine['category_name']; break;
				                                    case 'search': $breadcrumb = trans('globals.result_for'); break;
				                                    default: $breadcrumb = $key; break;
				                                }
				                                $filterSelected[$key] = [
				                                    'label' => ucwords($value),
				                                    'url' => "/products?".\Utility::removeFromUrlQueryString($refine, $key)
				                                ];
				                            ?>
				                            <strong>{{ ucwords($breadcrumb) }}:</strong>&nbsp;{{ ucwords($value) }}
				                            <a href="/products?{{ \Utility::removeFromUrlQueryString($refine, $key) }}">
				                                <span class="glyphicon glyphicon-remove"></span>
				                            </a>
				                        </small>
				                    </li>
				                @endif
				            @endforeach

				         </ol>
				    </div>
				</div>

				<div class="group">
					{{--<div class="g-shaixuan">
						<button id="g_shaixuan">收起筛选<img src="/img/szy/inc/top-jt.png" alt=""></button>
					</div>--}}

					@foreach ($filters as $key => $filter)
					<div class="g-row">
						<div class="head">
							<h4>
							<span class="title" title="品牌">
								@if($key=='category' || $key=='conditions' ||$key=='brands')
								{{ trans('globals.filters.'.$key) }}:
								@else
								{{ $key }}:
								@endif
							</span>
							</h4>
						</div>
						<div class="body">
							<div class="items">
							<?php $i=0; ?>
                            @if($key=='category')
                                @foreach ($filter as $id => $item)
                                    <?php if (4<$i++){ break; } ?>
                                        <a href="/products?{{ \Utility::getUrlQueryString($refine, 'category', urlencode($item['id'].'|'.$item['name'])) }}">
                                            {{ ucfirst($item['name']) }} <small><span class="badge">{{ $item['qty'] }}</span></small>
                                        </a>
                                @endforeach

                            @else

                                @foreach ($filter as $item => $count)
                                    <?php if (4<$i++){ break; } ?>
                                        <a href="/products?{{ \Utility::getUrlQueryString($refine, $key, urlencode($item)) }}">
                                          {{ ucfirst($item) }} <span class="badge">{{ $count }}</span>
                                        </a>
                                @endforeach
                            @endif
							</div>
						</div>
						<div class="foot">
							@if ($i > 5)
	                            <small ng-controller="ModalCtrl" ng-click="modalOpen({templateUrl:'{{ $key }}-snippet', size: 'md'})" >
	                                <a href="javascript:void(0)">
	                                    <span class="glyphicon glyphicon-zoom-in"></span>&nbsp;
	                                    {{ trans('globals.see_more') }}
	                                </a>
	                            </small>
	                        @elseif($i == 0)
	                            <ul class="nav navbar-nav" >
	                                <li><a href="javascript:window.history.back()"><span class="glyphicon glyphicon-menu-left"></span>&nbsp;{{ trans('globals.go_back_label') }}</a></li>
	                                @if (isset($filterSelected[$key]) && count($filterSelected) > 0)
	                                <li>
	                                    <a href="{{ ucwords($filterSelected[$key]['url']) }}">
	                                        <span class="glyphicon glyphicon-remove"></span>&nbsp;
	                                        {{ ucwords($filterSelected[$key]['label']) }}
	                                    </a>
	                                </li>
	                                @endif
	                            </ul>
	                        @endif
						</div>
					</div>
					@endforeach
					{{-- 价格 --}}
					<div class="g-row">
						<div class="head">
							<h4>
							<span class="title" title="价格">
								{{ trans('globals.filters.price_range') }}:
							</span>
							</h4>
						</div>
						<div class="body">
							<div class="items">
                                <form method="GET" action="/products" name="rangepriceForm" novalidate>
                                	&nbsp;
                                    <input class=" input-sm" type="number" value="{{ isset($refine['min']) ? $refine['min'] : '' }}" name="min" id="min" placeholder="{{ trans('globals.min_label') }}">
                                    <input class=" input-sm" type="number" value="{{ isset($refine['max']) ? $refine['max'] : '' }}" name="max" id="max" placeholder="{{ trans('globals.max_label') }}">
                                    <button type="submit" class="input-sm">确定</button>
                      
                                    @foreach ($refine as $key => $value)
                                        @if (trim($value)!='' && $key != 'category_name' && $key != 'min' && $key != 'max')
                                            <?php $value = $key == 'category' ? $value.'|'.urlencode($refine['category_name']) : $value; ?>
                                            <input type="hidden" name="{{ $key }}" id="{{ $key }}" value="{{ $value }}">
                                        @endif
                                    @endforeach
                                </form>
							</div>
						</div>
					</div>

					    <script type='text/ng-template' id="{{ $key }}-snippet" class="panel">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button ng-click="$close(false)" type="button" class="close"><span aria-hidden="true">&times;</span></button>
                                    {{ trans('globals.filters.'.$key) }}
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <ul class="list-inline">
                                            @if($key=='category')
                                                @foreach ($filter as $id => $item)
                                                <li class="text-capitalize  col-xs-12 col-sm-4 col-md-4">
                                                    <a href="/products?{{ \Utility::getUrlQueryString($refine, 'category', urlencode($item['id'].'|'.$item['name'])) }}" >
                                                        {{ $item['name'] }} <span class="badge">{{ $item['qty'] }}</span>
                                                    </a>
                                                </li>
                                                @endforeach
                                            @else
                                                @foreach ($filter as $item => $count)
                                                <li class="text-capitalize  col-xs-12 col-sm-4 col-md-4">
                                                    <a href="/products?{{ \Utility::getUrlQueryString($refine, $key, urlencode($item)) }}" >
                                                        {{ $item }} <span class="badge">{{ $count }}</span>
                                                    </a>
                                                </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="modal-footer clearfix">
                                    <button ng-click="$close(false)" class="btn btn-info btn-sm pull-left">
                                        {{ trans('globals.close_label') }}
                                    </button>
                                </div>
                            </div>
                        </script>
				</div>
			</div>

			<div class="sort_row">
				<ul id="order_search">
					<li @if($order=='all')class="active" ade="{{$ade}}" @endif val='all'>综合排序
						@if($order=='all')
							@if($ade=='desc')
							<img src="/img/szy/inc/jt-footer.png" alt="">
							@else 
							<img src="/img/szy/inc/jt-top.png" alt=""> 
							@endif 
						@endif
					</li>
					{{--<li @if($order=='sell')class="active" ade="{{$ade}}"@else ade="asc" @endif val='sell'>销量 
						@if($order=='sell')
							@if($ade=='desc')
							<img src="/img/szy/inc/jt-footer.png" alt="">
							@else 
							<img src="/img/szy/inc/jt-top.png" alt=""> 
							@endif 
						@endif
					</li>--}}
					<li @if($order=='price')class="active" ade="{{$ade}}"@else ade="asc"@endif val='price'>价格
						@if($order=='price')
							@if($ade=='desc')
							<img src="/img/szy/inc/jt-footer.png" alt="">
							@else 
							<img src="/img/szy/inc/jt-top.png" alt=""> 
							@endif 
						@endif
					</li>
					<li @if($order=='date')class="active" ade="{{$ade}}"@else ade="asc"@endif val='date'>发布时间
						@if($order=='date')
							@if($ade=='desc')
							<img src="/img/szy/inc/jt-footer.png" alt="">
							@else 
							<img src="/img/szy/inc/jt-top.png" alt=""> 
							@endif 
						@endif
					</li>
				</ul>
			</div>
			
			<div class="itemList">
				@if (count($products) > 0)
	                @foreach ($products as $product)
						<div class="good">
							<span class="price">¥{{$product['price']}}</span>
							<a href="products/{{$product['id']}}"><img src="{{$product['features']['images'][0]}}" alt=""></a>
							<div class="introduce">
							<span><a href="products/{{$product['id']}}">{{$product['name']}}</a></span>
							</div>
							<div class="icons">
		                        <form action="user/orders/addTo/cart/{{$product['id']}}" method="POST">
		                            <input name="_method" type="hidden" value="PUT">
		                            {{ csrf_field() }}
		                            <input type="submit" style="display:none" id="cart_submit">
		                        </form>
		                        <a href="javascript:void(0);" onclick="$('input[id=cart_submit]').click();">
		                            <div class="cz-san gwc glyphicon glyphicon-shopping-cart option"></div>
		                        </a>
		                        <a href="user/orders/addTo/wishlist/{{$product['id']}}">
		                            <div class="cz-san glyphicon glyphicon-heart option"></div>
		                        </a>
		                        <a href="products/{{$product['id']}}"><div class="cz-san glyphicon glyphicon-eye-open option"></div></a>
							</div>
						</div>
	                @endforeach
	            @else
	                <div class="row">
	                    <div class="alert alert-warning alert-dismissible" role="alert">
	                        <div class="row">
	                            <div class="col-md-12">
	                                <strong>
	                                    <span class="glyphicon glyphicon-filter"></span>&nbsp;
	                                    {{ trans('globals.your_search') }}
	                                </strong>
	                                &nbsp;{{ trans('globals.message_no_results_01') }}.
	                            </div>
	                        </div>
	                        <div class="row">&nbsp;</div>
	                        <div class="row">
	                            <div class="col-md-12">
	                                {{ trans('globals.message_no_results_02') }}.
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            @endif
			</div>
			
			<div class="mainsrp_pager">
				<div class="inner">

			{!! $products->appends(Request::only(['category', 'search', 'conditions', 'brands', 'color', 'model', 'min', 'max','order','ade']))->render() !!}
					{{--
					<ul class="items">
						<li class="item_prev">
							<a href="#">
								<span class="icons"></span>
								<span class="prev">上一页</span>
							</a>
						</li>
						<li class="item"><span class="num">1</span></li>
						<li class="item"><a href="#">2</a></li>
						<li class="item"><a href="#">3</a></li>
						<li class="item"><a href="#">4</a></li>
						<li class="item"><a href="#">5</a></li>
						<li class="item"><a href="#">6</a></li>
						<li class="item"><a href="#">7</a></li>
						<li class="item_dot">...</li>
						<li class="item_next">
							<a href="">
								<span class="next">下一页</span>
								<span class="icons"></span>
							</a>
						</li>
					</ul>
					<div class="total_page">共31页</div>
					<div class="form">
						<span class="text">到第</span>
						<input type="text" value="2">
						<span class="text">页</span>
						<span class="btn">确定</span>
					</div>--}}
				</div>
			</div>

			<div class="mainsrp_related">
				<div class="m-related">
						<span class="title">您是不是想找：</span>
						<ul class="item">
							@foreach($xzs as $xz)
							<li><a href="products?search={{$xz->name}}">{{$xz->name}}</a></li>
							@endforeach
						</ul>
					</dl>
				</div>
				<div class="search_again">
					<span class="title" >重新搜索：</span>
					<input type="text" value="  雪梨" id="footer_search" value="@if(isset($_GET['search'])){{$_GET['search']}}@endif">
					<button onclick="search2();">搜索</button>
				</div>
			</div>
		</div>
		</div>
	</div>
@stop

@section('scripts')

   @parent
	<script type="text/javascript">

		//替换和增加url参数与值
		function changeURLPar(destiny, par, par_value) 
		{ 
			var pattern = par+'=([^&]*)'; 
			var replaceText = par+'='+par_value; 

			if (destiny.match(pattern)) 
			{ 
			var tmp = '/\\'+par+'=[^&]*/'; 
			tmp = destiny.replace(eval(tmp), replaceText); 
			return (tmp); 
			} else { 
				if (destiny.match('[\?]')) { 
					return destiny+'&'+ replaceText; 
				} else { 
					return destiny+'?'+replaceText; 
				} 
			} 
			return destiny+'\n'+par+'\n'+par_value; 
		}


		//排序搜索
		$("#order_search li").click(function(){

			var order = $(this).attr('val');
			var ade = $(this).attr('ade');
			if (ade=='desc') {
				ade = 'asc';
			}else{
				ade = 'desc';
			}
			window.location.href=changeURLPar(changeURLPar(window.location.href,'order',order),'ade',ade);
		});

		//商品搜索跳转
		function search2(){
			window.location.href="products?search="+$("#footer_search").val(); 
		}
	</script>
@show

