@extends('szy.layouts.orders-pay-app')

@section('title')
我家菜市 - 订单确认 
@stop

@section('css')
    {!! Html::style('/css/szy/orders-pay.css') !!}
@stop

@section('content')
    <div class="comfirmOrder">
        <div class="order_address">
            <h2>选择收货地址</h2>
            <div class="inner">
                @if (count($addresses) == 0)
                    <h1>没有地址 请添加</h1>
                @else
                    @foreach ($addresses as $address)
                    <div class="list">
                        <div class="addr_hd">
                            <span class="name">{{ $address->name_contact }}</span>
                            <span>({{ $address->state}} {{$address->city }})</span>
                        </div>
                        <div class="addr_bd">
                            <span class="street">{{$address->line1}}</span>
                            <br/>
                            <span class="phone">{{ $address->phone }}</span>
                        </div>
                    </div>
                    @endforeach
                @endif

            </div>
            <div class="control">
                <a href="javascript:void(0);" id="showAddress" state=0>全部地址显示</a>
                <a href="user/address">管理收货地址</a>
            </div>
            <div class="pay_way">
                <h1>支付方式</h1>
                <div class="items">
                    <ul>
                        <li><a href="">在线支付</a></li>
                        <li><a href="">微信支付</a></li>
                        <li><a href="">支付宝支付</a></li>
                        <li><a href="">货到付款</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="order_confirm">
            <h2 class="buy_th_title">确认订单</h2>
            <div class="buy_th">
                <div class="buy_td">店铺：美妆时尚旗舰店</div>
                <div class="buy_td">价格(元)</div>
                <div class="buy_td">数量</div>
                <div class="buy_td">优惠(元)</div>
                <div class="buy_td">总计(元)</div>
                <div class="buy_td">配送方式</div>
            </div>
        </div>
        <div class="order_item">
            <div class="order_itemInfo">
                <div class="info_detail">
                    <div class="info_img"><a href="#"><img src="#" alt=""></a></div>
                    <div class="info_cell">
                        <a href="#" class="info_title">【美妆时尚】梨 莱阳梨皇冠梨新鲜水果雪梨雪花梨山东梨子水果</a>
                        <span class="kg">5斤装</span>
                    </div>
                </div>
                <div class="info_price">39.9</div>
            </div>
            <div class="order_quantity">
                <div class="quantity_inner">
                    <span class="quantity_left_minus">-</span>
                    <input type="text" class="amount" value="1">
                    <span class="quantity_left_add">+</span>
                </div>                      
            </div>
            <div class="order_privilege">
                <div class="privilege_selecter">
                    <span>-</span>
                </div>
            </div>
            <div class="order_itemPay">
                <span>39.9</span>
            </div>
            <div class="delivery_way">
                <select>
                    <option value="快递 免邮">快递 免邮</option>
                    <option value="不满5斤 邮费5元">不满5斤 邮费5元</option>
                </select>
            </div>
        </div>
        <div class="order_Ext">
            <div class="order_memo">
                <label for="" class="memo_name">给卖家留言：</label>
                <div class="memo_detail">
                    <textarea class="text_area_input" placeholder="选填，可填写您和卖家达成一致的要求"></textarea>
                </div>
            </div>

        </div>
        <div class="order_payinfo">
            <div class="order_realPay">
                <span class="realPay_title">实付款:</span>
                <span class="order_price">￥</span>
                <span class="order_price">39.9</span>
            </div>
        </div>
        <div class="order_submit">
            <div class="wrap">
                <a href="#">提交订单</a>
            </div>
        </div>
    </div>
@stop {{-- end content --}}

@section('scripts')
    @parent
    <script type="text/javascript">

        //显示 隐藏 地址
        $("#showAddress").click(function(){
            if ($(this).attr('state')>0) {
                $(".inner").css('height','125px');
                $(this).attr('state',0);
                $(this).html('全部地址显示');
            }else{
                $(".inner").css('height','auto');
                $(this).attr('state',1);
                $(this).html('部分地址显示');
            }
        });

        //选择地址
        $(".list").click(function(){
            $(".list").css('background','url(/img/szy/inc/frame1.png) no-repeat');
            $(this).css('background','url(/img/szy/inc/frame.png) no-repeat');
        });
    </script>
@show
