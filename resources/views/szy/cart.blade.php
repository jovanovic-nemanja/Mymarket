<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" ng-app="AntVel">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="/">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>我家菜市 - 购物车</title>
    {{-- Antvel CSS files --}}
    {!! Html::style('/antvel-bower/bootstrap/dist/css/bootstrap.css') !!}
    {!! Html::style('/css/szy/cart.css') !!}
</head>
<body>
    @include('szy.layouts.celerity')
    @include('szy.layouts.cart-header')

    <div class="wrap">
        <div class="cart">
            <div class="all_good">
                <span>全部商品</span>
                <span class="number">{{$count}}</span>
            </div>
            <div class="cart_main">
                <div class="cart_table_th">
                    <div class="wp">
                       <div class="th_chk">
                            <div class="select">
                                 {{--<input type="checkbox" name="select_all" value="true">
                                <span>全选</span>--}}
                            </div>
                        </div>
                        <div class="th_item">
                            <div class="td_inner">商品</div>
                        </div>
                        <div class="th_info">
                            <div class="td_inner">&nbsp;参数</div>
                        </div>
                        <div class="th_price">
                            <div class="td_price">单价(元)</div>
                        </div>
                        <div class="th_amount">
                            <div class="td_amount">数量</div>
                        </div>
                        <div class="th_sum">
                            <div class="td_sum">小计(元)</div>
                        </div>
                        <div class="th_operate">
                            <div class="td_operate">操作</div>
                        </div>
                    </div>
                </div>
                <div class="orderList">
                    @if(!empty($cartProducts))
                    @foreach($cartProducts as $carts)
                    <div class="orderHolder">
                        <div class="shop_info">
                            <div class="cart_checkbox">
                                <input type="checkbox" name="select_all" class="business-input"  value="true">
                                <span >店铺 ：{{$cart['business']}}</span>
                            </div>
                        </div>
                        @foreach($carts['product'] as $cart)
                        <div class="order_content">
                            <ul class="item_content">
                                <li class="td_chk">
                                    <div class="td_inner">
                                        <div class="select">
                                            <input type="checkbox" class="product-input" name="select_all" value="true">
                                        </div>
                                    </div>  
                                </li>
                                <li class="td_item">
                                    <div class="td_inner">
                                        <div class="info_img"><a href="products/{{$cart['id']}}"><img src="{{$cart['features']['images'][0]}}" alt=""></a></div>
                                        <div class="info_cell">
                                            <a href="#" class="info_title">{{$cart['name']}}</a>
                                            {{--<span class="kg">5斤装</span>--}}
                                        </div>
                                    </div>
                                </li>
                                <li class="th_info">
                                    <div class="item_props">
                                        <p>12颗净重6斤</p>
                                        <p>单果重约225g-275g</p>
                                    </div>
                                </li>
                                <li class="th_price">
                                    <div class="td_inner">
                                        <p>{{$cart['price_raw']}}</p>
                                        <p>{{$cart['price']}}</p>
                                    </div>
                                </li>
                                <li class="th_amount" >
                                    <div class="td_inner">
                                        <span class="quantity_left_minus">-</span>
                                        <input type="text"  class="amount" value="1" maxp="{{$cart['stock']}}">
                                        <span class="quantity_left_add" maxp="{{$cart['stock']}}">+</span>
                                    </div>
                                </li>
                                <li class="th_sum">
                                    <div class="td_inner">
                                        ￥<span>{{$cart['price']}}</span>
                                    </div>
                                </li>
                                <li class="th_operate">
                                    <div class="td_inner">
                                        <a href="user/orders/addTo/wishlist/{{$cart['id']}}"><p><img src="/img/szy/inc/collect.png" alt=""><span>移入我的关注</span></p></a>
                                        <a href="{{ action('OrdersController@removeFromOrder', ['cart', $cart['id']]) }}"><p><img src="/img/szy/inc/red_del.png" alt=""><span>删除</span></p></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                    @else
                        <h1>你还没有加入商品到购物车！</h1>
                    @endif
                </div>
            </div>
            <div class="float_bar_holder">
                <div class="float_bar_wrap">
                    <div class="select_all">
                        <div class="cart_checkbox">
                            <input type="checkbox" class="all-input" name="select_all" value="true">
                            <span>全选</span>
                        </div>
                    </div>
                    <div class="opreation">
                        <a href="#">删除勾选商品</a>
                        <a href="#">移到我的关注</a>
                        <a href="#"></a>
                        <a href="#"></a>
                    </div>
                    <div class="float_bar_right">
                        <div class="amount_sum">
                            <span class="txt">已勾选</span>
                            <em class="sum" id="checkedNum">0</em>
                            <span class="txt">件商品</span>
                        </div>
                        <div class="price_sum">
                            <span class="txt">合计（不含运费）:</span>
                            <strong>
                                ￥ <em>0.00</em>
                            </strong>
                            
                        </div>
                        <div class="btn_aera">
                            <a href=""><span>去结算</span></a>
                        </div>
                    </div>
                </div>
            </div>
            @if(isset($suggestions) && is_array($suggestions))
            <div class="related_main">
                <div class="related_title">
                    <span></span>
                    <span>相关产品</span>
                </div>
                <div class="related_product">
                    <div class="picScroll-left">
                        <div class="bd">
                            <div class="prev"><</div>
                            <div class="next">></div>
                            <ul class="picList">      
                                @foreach ($suggestions as $product)
                                <li>
                                    <div class="price p-bg-green">￥{{$product['price']}}</div>
                                    <div class="pic">
                                        <div class="desc bg-green"><a href="products/{{$product['id']}}">{{$product['name']}}</a></div>
                                        <a href="products/{{$product['id']}}" target="_blank"><img src="{{$product['features']['images'][0]}}" /></a>
                                    </div>  
                                    <div class="check">
                                        <form action="user/orders/addTo/cart/{{$product['id']}}" method="POST">
                                            <input name="_method" type="hidden" value="PUT">
                                            {{ csrf_field() }}
                                            <input type="submit" style="display:none" id="cart_submit">
                                        </form>
                                        <a href="javascript:void(0);" onclick="$('input[id=cart_submit]').click();">
                                            <div class="gwc glyphicon glyphicon-shopping-cart option"></div>
                                        </a>
                                        <a href="user/orders/addTo/wishlist/{{$product['id']}}">
                                            <div class="sc glyphicon glyphicon-heart option"></div>
                                        </a>
                                        <a href="products/{{$product['id']}}"><div class="ly glyphicon glyphicon-eye-open option"></div></a>
                                    </div>                      
                                </li>
                                @endforeach   
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    @include('szy.layouts.footer')
        
    </div>
</body>

    {!! Html::script('/js/szy/jquery-1.8.3.min.js') !!}
    {!! Html::script('/js/szy/jquery.SuperSlide.2.1.1.js') !!}
    <script type="text/javascript">
        jQuery(".picScroll-left").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"leftLoop",autoPlay:true,vis:5});
        //商品搜索跳转
        function search(){
            window.location.href="products?search="+$("#home_search").val(); 
        };

        //店铺全选
        $(".business-input").click(function(){
            var state = this.checked;
            $(this).parents('.orderHolder').children('.order_content').each(function(){
               $(this).find('.product-input').prop('checked',state);
            });
            countPrice();
            checkedNum();
        });

        //所有全选
        $(".all-input").click(function(){
            $('.product-input').prop('checked',this.checked);
            $('.business-input').prop('checked',this.checked);
            countPrice();
            checkedNum();
        });

        //单选
        $(".product-input").click(function(){
            countPrice();
            checkedNum();
        });

        //数量 加号点击事件
        $(".quantity_left_add").click(function(){
            var text = parseInt($(this).siblings(".amount").val());
            var maxp = $(this).attr('maxp');
            if (text < maxp) {
                $(this).siblings(".amount").val(parseInt(text+1));
            }else{
                alert('商品库存已达到上限！');
            }
            productPrice($(this),$(this).siblings(".amount").val());
            countPrice();
        });

        //数量 减号点击事件
        $(".quantity_left_minus").click(function(){
            var text = parseInt($(this).siblings(".amount").val());
            if (text>1) {
                $(this).siblings(".amount").val(parseInt(text-1));
            };
            productPrice($(this),$(this).siblings(".amount").val());
            countPrice();
        });

        //数量 输入change事件
        $(".td_inner .amount").change(function(){
            if($(this).val()<1){
                alert('数量不能小于1！');
                $(this).val(1);
            }
            if($(this).val()>= $(this).attr('maxp')){
                alert('数量超过库存！');
                $(this).val($(this).attr('maxp'));
            }
            var re = /^[0-9]*[1-9][0-9]*$/ ;  
            var ck = re.test($(this).val());
            if(!ck){
                alert('数量为正整数！');
                $(this).val(1);
            }
            productPrice($(this),$(this).val());
            countPrice();
        });

        //计算单个商品价格
        function productPrice(obj,amount){
            var price = obj.parents('.th_amount').siblings(".th_price").find('p').eq(1).html();
            obj.parents('.th_amount').next('.th_sum').find('.td_inner span').html(parseInt(amount)*price);
            // obj.parents('.th_amount').next('.th_sum').find('.td_inner span').html(parseInt(amount)*price);
        }

        //计算总价格
        function countPrice(){
            var count = 0;
            $('.product-input:checked').each(function(i){
                count+=parseInt($(this).parents(".item_content").children('.th_sum').find('.td_inner span').html());
            });
            $(".price_sum").find('em').html(count);
        }
        //勾选商品数量
        function checkedNum(){
            $("#checkedNum").html($('.product-input:checked').length);
        }

    </script>
</html>

