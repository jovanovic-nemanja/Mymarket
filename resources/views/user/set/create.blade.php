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
				<h6><span class="glyphicon glyphicon-cog"></span> 创建卖家用户</h6>
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
				<div class="col-md-12">
						{!! Form::open(['url'=>'user/set', 'class'=>'form-horizontal','role'=>'form']) !!}
							<input type="hidden" name="role" value="business">
							<div class="form-group">
								<div class="col-md-12">
									{!! Form::label('last_name','用户名') !!}:
									<div class="input-group">
						      			<div class="input-group-addon"><span class="fa fa-align-justify"></span></div>
										{!! Form::text('nickname', null, ['ng-disabled'=>'disabled','class'=>'form-control']) !!}
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-12">
									{!! Form::label('email',trans('user.email')) !!}:
									<div class="input-group">
							      		<div class="input-group-addon"><span class="fa fa-envelope"></span></div>
										{!! Form::email('email', '', ['ng-disabled'=>'disabled','class'=>'form-control']) !!}
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-12">
									{!! Form::label('password',trans('user.password')) !!}:
									<div class="input-group">
								      	<div class="input-group-addon"><span class="fa fa-lock"></span></div>
										{!! Form::password('password', ['class'=>'form-control']) !!}
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-12">
									{!! Form::label('business_name','店铺名称') !!}:
									<div class="input-group">
							      		<div class="input-group-addon"><span class="fa fa-align-justify"></span></div>
										{!! Form::text('business_name', '', ['ng-disabled'=>'disabled','class'=>'form-control']) !!}
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-12">
									{!! Form::label('state','店铺状态') !!}:
									<div class="input-group">
										{!! Form::radio('state', '0', ['ng-disabled'=>'disabled','class'=>'form-control']) !!}关闭
										&nbsp;&nbsp;&nbsp;&nbsp;
										{!! Form::radio('state', '1', ['ng-disabled'=>'disabled','class'=>'form-control']) !!}开启
									</div>
								</div>
							</div>

						{{-- <div class="row">
							<div class="col-md-12">
								<label>{{ trans('user.are_you_human') }}</label>
								{!! Recaptcha::render() !!}
							</div>
						</div>--}}

							<div class="form-group">
								<div class="col-md-12">
									<hr>
									<div class="btn-group" role="group">
										<button type="submit" class="btn btn-primary">
											<span class="glyphicon glyphicon-send"></span>
											&nbsp;{{ trans('user.create_my_account') }}
										</button>
									</div>
								</div>
							</div>
						{{ Form::hidden('_method', 'POST') }}
						{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@stop
@section('script')
@parent
@stop