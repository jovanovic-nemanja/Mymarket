@extends('szy.layouts.master')

@section('title')
我家菜市 - 首页 
@stop



@section('content')

    <!-- 首页内容 -->

    <!-- 轮播 -->
    <div class="lb">
        <div class="slideBox" id="slideBox">
            <div class="hd">
                <ul><li>1</li><li>2</li><li>3</li></ul>
            </div>
            <div class="bd">
                <ul>
                    @foreach ($banner as $pic)
                            @if (!empty($pic))
                                <li><a href="" target="_blank"><img src="{{ $pic }}" alt=""/></a></li>
                            @endif
                    @endforeach   
                </ul>
            </div>

            <!-- 下面是前/后按钮代码，如果不需要删除即可 -->
            <a class="prev" href="javascript:void(0)"></a>
            <a class="next" href="javascript:void(0)"></a>
        </div>
    </div>

    <!-- 新品推荐 -->
    <div class="price">
        <div class="img"></div>
        <div class="picScroll-left">
            <div class="bd">
                <div class="prev"><</div>
                <div class="next">></div>
                    @if (!empty($newProduct))
                <ul class="picList">      
                    @foreach ($newProduct as $product)
                        <li>
                            <div class="pic">
                                <div class="desc"><a href="products/{{$product->id}}">{{$product->name}} ￥{{$product->price}} </a></div>
                                <a href="products/{{$product->id}}" target="_blank"><img src="{{json_decode($product->features)->{'images'}[0]}}" /></a>
                            </div>
                        </li>
                    @endforeach   
                </ul>
                    @endif

            </div>
        </div>
    </div>

    <!-- 热卖推荐 -->
    <div class="sell">
        <div class="picScroll-left-two">
            <div class="title">
                <div class="left">&nbsp;热卖推荐 HOT RECOMMENDATION</div>
                <div class='right'>
                    <div class="next jt">></div>
                    <div class="next wz">换一批</div>
                </div>
            </div>
            <div class="bd">
                @if (!empty($sells))
                <ul class="picList">
                    @foreach ($sells as $sell)
                    <li>
                        <div class="price p-bg-orange">￥{{$sell->price}}</div>
                        <div class="pic">
                            <div class="desc"><a href="products/{{$sell->id}}">{{$sell->name}}</a></div>
                            <a href="products/{{$sell->id}}" target="_blank"><img src="{{json_decode($sell->features)->{'images'}[0]}}" /></a>
                        </div>  
                        <div class="check">
                            <form action="user/orders/addTo/cart/{{$sell->id}}" method="POST">
                                <input name="_method" type="hidden" value="PUT">
                                {{ csrf_field() }}
                                <input type="submit" style="display:none" id="cart_submit">
                            </form>
                            <a href="javascript:void(0);" onclick="$('input[id=cart_submit]').click();">
                                <div class="gwc glyphicon glyphicon-shopping-cart option"></div>
                            </a>
                            <a href="user/orders/addTo/wishlist/{{$sell->id}}">
                                <div class="sc glyphicon glyphicon-heart option"></div>
                            </a>
                            <a href="products/{{$sell->id}}"><div class="ly glyphicon glyphicon-eye-open option"></div></a>
                        </div>                      
                    </li>
                    @endforeach
                @endif
                </ul>
            </div>
        </div>
        <div class="gps">
            <div class="title">导航</div>
            @foreach ($lcs as $n)
            <li><img src="{{$n[0]->image}}">{{$n[0]->name}}</li>
            @endforeach
            <li id="webTop"><img src="/img/szy/inc/arrows-top.png">顶部</li>
        </div>
    </div>

    <div id="gps-jd"></div>

    @foreach ($lcs as $lc)
    <!-- 分类展示1 -->
    <div class="product-class" >
        <div class="hf" name='c1'>
            <img src="{{$lc[0]->image_w}}">
        </div>
        <div class="title">
            <div class="left">
                &nbsp;{{$lc[0]->name}} {{$lc[0]->english}}
            </div>
            <div class="right">
                @foreach ($lc[1] as $l)
                <li class="bd-{{$lc[0]->color}}"><a href="/products?category={{$l->name}}" class="z-{{$lc[0]->color}}">{{$l->name}}</a></li>
                @endforeach
            </div>
        </div>
        <div class="product">
            <div class="zt bg-{{$lc[0]->color}}">
                <img src="{{$lc[0]->image_h}}">
                <div class="ms">{{$lc[0]->description}}</div>
            </div>
            <div class="list">
                @foreach ($lc[2] as $lp)
                <li>
                    <div class="price p-bg-{{$lc[0]->color}}">￥{{$lp->price}}</div>
                    <div class="pic">
                        <div class="desc bg-{{$lc[0]->color}}"><a href="products/{{$lp->id}}">{{$lp->name}}</a></div>
                        <a href="products/{{$lp->id}}" target="_blank"><img src="{{json_decode($lp->features)->{'images'}[0]}}" /></a>
                    </div>  
                    <div class="check">
                        <a href="javascript:void(0);" onclick="$('input[id=cart_submit]').click();">
                            <div class="gwc hv-{{$lc[0]->color}} glyphicon glyphicon-shopping-cart option"></div>
                        </a>
                        <a href="user/orders/addTo/wishlist/{{$lp->id}}">
                            <div class="sc hv-{{$lc[0]->color}} glyphicon glyphicon-heart option"></div>
                        </a>
                        <a href="products/{{$lp->id}}">
                            <div class="ly hv-{{$lc[0]->color}} glyphicon glyphicon-eye-open option"></div>
                        </a>
                    </div>  
                </li>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach 


@stop {{-- end content --}}

@section('scripts')
    @parent
    <script type="text/javascript">
        jQuery(".slideBox").slide({mainCell:".bd ul",effect:"leftLoop",autoPlay:true});
        jQuery(".picScroll-left").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"leftLoop",autoPlay:true,vis:4});
        jQuery(".picScroll-left-two").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"leftLoop",autoPlay:false,scroll:5,vis:5,easing:"easeOutBounce",delayTime:500});

        //导航GPS
        window.onscroll = function(){
            var top = $("#gps-jd").offset().top;//分界标签到顶部距离
            var webTop = $(document).scrollTop();//滚动条到顶部距离
            var pm = document.body.clientHeight;//浏览器高度

            //定位方式切换
            if (top-webTop<=0) {
                var width = $(".gps").offset().left;
                $(".gps").css('position','fixed');
                $(".gps").css('right',null);
                $(".gps").css('top',0);
                $(".gps").css('left',width);
            }else{
                $(".gps").css('position','relative');
                $(".gps").css('left',null);
                $(".gps").css('right','55px');
                $(".gps").css('top','30px');
            }

            //导航模块背景颜色
            for(var i=0;i<$(".product-class .hf").length;i++){
                var cTop = $(".product-class .hf").eq(i).offset().top;
                if (cTop-pm-webTop<=-300) {
                    $(".gps li").css('background','#999999');
                    $(".gps li").eq(i).css('background','#31C4A8');
                };
            }
        }

        //导航跳转模块
        var liLegth = $(".gps li").length;
    　　$.each($(".gps li"), function(i,v){ 
            if (i<liLegth-1) {
                $(".gps li").eq(i).click(function(){
                    window.scrollTo(0,$(".product-class .hf").eq(i).offset().top);
                }); 
            };
        });
        $("#webTop").click(function(){
            window.scrollTo(0,0);
        });
    </script>
@show
