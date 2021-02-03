@extends('layouts.wpanel')
@section('title')@parent- {{ trans('company.store_config')}} @stop
@section('panel_left_content')
@parent
@stop
@section('center_content')
<div class="container-fluid">
	<div class="row">
		<div class="panel panel-default" ng-controller = "ProfileController" >
			<div class="panel-heading">
				<h6><span class="glyphicon glyphicon-cog"></span> 用户设置
				<a href="user/set/create" class="btn btn-default btn-md pull-right btn-szyclass">新 建</a>
				</h6>
			</div>
			<div class="panel-body" style="min-height:500px;">
				<ul class="nav nav-tabs" >
				  <li class="active" style="float:left"><a data-toggle="tab" href="#profile">卖家用户</a></li>
				</ul>

	            <div class="panel-body" style="min-height:500px;">
	            <input type="search" ng-model="search" class="form-control" placeholder="{{ trans('globals.search_for').' '.trans('product.inputs_view.name') }}"/>
	                <ul class="list-group">
	                    <li class="list-group-item list-group-item-info hidden-xs">
	                        <div class="row">
	                            <div class="col-md-1">#ID</div>
	                            <div class="col-md-2">用户名</div>
	                            <div class="col-md-3">邮箱</div>
	                            <div class="col-md-2">创建日期</div>
	                            <div class="col-md-1">用户状态</div>
	                            <div class="col-md-1">商铺状态</div>
	                            <div class="col-md-2">操作</div>
	                        </div>
	                    </li>
	                    @foreach($users as $user)
	                    <li class="list-group-item">
	                        <div class="row">
	                            <div class="col-md-1">{{ $user->id }}</div>
	                            <div class="col-md-2"><a href="{{ route('wpanel.productsdetails.show',$user->id) }}">{{ $user->nickname }}</a></div>
	                            <div class="col-md-3">{{$user->email}}</div>
	                            <div class="col-md-2">{{$user->creation_date }}</div>
	                            <div class="col-md-1">@if($user->disabled_at !="")关闭@else 正常@endif</div>
	                            <div class="col-md-1">@if($user->state !=1)关闭@else 正常@endif</div>
	                            <div class="col-md-2">
	                            	<a href="user/set/{{ $user->id }}/edit">编辑</a> 
	                            </div>	
	                        </div>
	                    </li>
	                    @endforeach
	                </ul>
	            </div>
	            <div>{{$users->links()}}</div>
			</div>
		</div>
	</div>
</div>
@stop
@section('script')
@parent
@stop
