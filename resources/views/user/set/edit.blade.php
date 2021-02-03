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
				<h6><span class="glyphicon glyphicon-cog"></span>编辑卖家用户</h6>
			</div>
			<div class="panel-body" style="min-height:500px;">
		    @if (count($errors) > 0)
		        <div class="alert alert-warning fade in">
		            <button data-dismiss="alert" class="close close-sm" type="button">
		                <i class="fa fa-times"></i>
		            </button>
		            <strong>{{trans('common.Whoops!')}}</strong>{{trans('common.error-tip')}}<br><br>
		            <ul>
		                @foreach ($errors->all() as $error)
		                    <li>{{ $error }}</li>
		                @endforeach
		            </ul>
		        </div>
		    @endif
				<form class="form-horizontal" role="form" action="user/set/{{$user->id}}" method='POST'>
					<input type="hidden" value="PUT" name="_method">
					{!! csrf_field() !!}
					<div class="row">
						<div class="col-md-12">
								<div class="form-group">
									<div class="col-md-12">
										用户名:
										<div class="input-group">
							      			<div class="input-group-addon"><span class="fa fa-align-justify"></span></div>
							      			<input class='form-control' type="text" value="{{$user->nickname}}" name="nickname">
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-12">
										Email:
										<div class="input-group">
								      		<div class="input-group-addon"><span class="fa fa-envelope"></span></div>
							      			<input class='form-control' type="text" value="{{$user->email}}" name="email">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										用户状态:
										<div class="input-group">
								      		<div class="input-group-addon"><span class="fa fa-envelope"></span></div>
								      			<select name="disabled_at" class='form-control'>
								      				<option value='true' @if($user->disabled_at=='')selected @endif>启用</option>
								      				<option value='false' @if($user->disabled_at!='')selected @endif>禁用</option>
								      			</select>
										</div>
									</div>
								</div>
							<div class="form-group">
								<div class="col-md-12">
									店铺名称:
									<div class="input-group">
							      		<div class="input-group-addon"><span class="fa fa-align-justify"></span></div>
							      		<input class='form-control' type="text" value="{{$business->business_name}}" name="business_name">
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-12">
									店铺状态:
									<div class="input-group">
							      		<input  type="radio" value="0" name="state" @if($business->state==0) checked=true @endif> 关闭
										&nbsp;&nbsp;&nbsp;&nbsp;
							      		<input type="radio" value="1" name="state" @if($business->state==1) checked=true @endif> 开启
									</div>
								</div>
							</div>
						</div>
					</div>
		            <div class="col-sm-4 col-sm-offset-2">
		              <button type="submit" class="btn btn-primary">提交</button>
		            </div>
		        </form>
			</div>
		</div>
	</div>
</div>
@stop
@section('script')
@parent
@stop