@extends('layouts.master')
@section('title')@parent - {{ trans('user.your_products') }} @stop
@section('page_class') my-products @stop
@section('content')
    @parent
    @section('panel_left_content')
        @include('user.partial.menu_dashboard')
    @stop
    @section('center_content')

        <div class="page-header"><h5>商铺信息</h5></div>
        
        <div class="row">
           <div class="col-lg-11">
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
				<form class="form-horizontal" role="form" action="business/myBusiness/{{$user->user_id}}" method='POST' enctype="multipart/form-data">
					<input type="hidden" value="PUT" name="_method">
					{!! csrf_field() !!}
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<div class="col-md-6">
									店铺名称:
									<div class="input-group">
							      		<div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
							      		<input class='form-control' type="text" value="{{$user->business_name}}" name="business_name" placeholder="店铺名称必填">
									</div>
								</div>
								<div class="col-md-6">
									经营范围:
									<div class="input-group">
							      		<div class="input-group-addon"><span class="glyphicon glyphicon-stats"></span></div>
							      		<input class='form-control' type="text" value="{{$user->range}}" name="range">
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6">
									店铺负责人:
									<div class="input-group">
							      		<div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
							      		<input class='form-control' type="text" value="{{$user->person}}" name="person">
									</div>
								</div>
								<div class="col-md-6">
									联系电话:
									<div class="input-group">
							      		<div class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></div>
							      		<input class='form-control' type="text" value="{{$user->phone}}" name="phone">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6">
									邮箱:
									<div class="input-group">
							      		<div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
							      		<input class='form-control' type="text" value="{{$user->email}}" name="email" placeholder="">
									</div>
								</div>
								<div class="col-md-6">
									传真:
									<div class="input-group">
							      		<div class="input-group-addon"><span class="glyphicon glyphicon-print"></span></div>
							      		<input class='form-control' type="text" value="{{$user->fax}}" name="fax">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									客户QQ:
									<div class="input-group">
							      		<div class="input-group-addon"><span class="glyphicon glyphicon-heart"></span></div>
							      		<input class='form-control' type="text" value="{{$user->qq}}" name="qq" placeholder="多个QQ使用 | 隔开">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									公司地址:
									<div class="input-group">
							      		<div class="input-group-addon"><span class="glyphicon glyphicon-tree-deciduous"></span></div>
							      		<input class='form-control' type="text" value="{{$user->address}}" name="address">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6">
									店铺LOGO:
									<div class="input-group">
							      		<input class='upload-pic' type="file" id="pic_logo" name="logo" style="display:none">
										<img src="{{$user->logo}}" alt="点击" class="thumbnail" onclick="$('input[id=pic_logo]').click();" width="140px" height="140px" style="cursor:pointer">
									</div>
								</div>
								<div class="col-md-6">
									店铺商标:
									<div class="input-group">
							      		<input class='upload-pic' type="file" id="pic_sb" name="dpphoto" style="display:none">
										<img src="{{$user->dpphoto}}" alt="点击" class="thumbnail" onclick="$('input[id=pic_sb]').click();" width="140px" height="140px" style="cursor:pointer">
									</div>
								</div>
							</div>
								店铺轮播图:
							<div class="form-group">
								<div class="col-md-2">
									<div class="input-group col-md-2">
							      		<input class='upload-pic' type="file" id="pic0" name="lbphoto[0]" style="display:none">
							      		@if(!empty($user->lbs[0]))
							      		<img src="{{$user->lbs[0]}}" alt="点击" class="thumbnail" onclick="$('input[id=pic0]').click();" width="100px" height="100px" style="cursor:pointer">
							      		@else
							      		<img src="" alt="点击" class="thumbnail" onclick="$('input[id=pic0]').click();" width="100px" height="100px" style="cursor:pointer">
							      		@endif
									</div>
								</div>
								<div class="col-md-2">
									<div class="input-group col-md-2">
							      		<input class='upload-pic' type="file" id="pic1"  name="lbphoto[1]" style="display:none">
							      		@if(!empty($user->lbs[1]))
							      		<img src="{{$user->lbs[1]}}" alt="点击" class="thumbnail" onclick="$('input[id=pic1]').click();" width="100px" height="100px" style="cursor:pointer">
										@else
							      		<img src="" alt="点击" class="thumbnail" onclick="$('input[id=pic1]').click();" width="100px" height="100px" style="cursor:pointer">
										@endif
									</div>
								</div>
								<div class="col-md-2">
									<div class="input-group col-md-2">
							      		@if(!empty($user->lbs[2]))
							      		<input class='upload-pic' type="file" id="pic2" name="lbphoto[2]" value="{{$user->lbs[2]}}" style="display:none">
							      		<img src="{{$user->lbs[2]}}" alt="点击" class="thumbnail" onclick="$('input[id=pic2]').click();" width="100px" height="100px" style="cursor:pointer">
										@else
							      		<input class='upload-pic' type="file" id="pic2" name="lbphoto[2]" style="display:none">
							      		<img src="" alt="点击" class="thumbnail" onclick="$('input[id=pic2]').click();" width="100px" height="100px" style="cursor:pointer">
							      		@endif
									</div>
								</div>
								<div class="col-md-2">
									<div class="input-group col-md-2">
							      		@if(!empty($user->lbs[3]))
							      		<input class='upload-pic' type="file" id="pic3" value="{{$user->lbs[3]}}"  name="lbphoto[3]" style="display:none">
							      		<img src="{{$user->lbs[3]}}" alt="点击" onclick="$('input[id=pic3]').click();" class="thumbnail" width="100px" height="100px" style="cursor:pointer">
										@else
							      		<input class='upload-pic' type="file" id="pic3"  name="lbphoto[3]" style="display:none">
							      		<img src="" alt="点击" onclick="$('input[id=pic3]').click();" class="thumbnail" width="100px" height="100px" style="cursor:pointer">
							      		@endif
									</div>
								</div>
								<div class="col-md-2">
									<div class="input-group col-md-2">
							      		@if(!empty($user->lbs[4]))
							      		<input class='upload-pic' type="file" id="pic4" name="lbphoto[4]" value="{{$user->lbs[4]}}" style="display:none">
							      		<img src="{{$user->lbs[4]}}" alt="点击" onclick="$('input[id=pic4]').click();" class="thumbnail" width="100px" height="100px" style="cursor:pointer">
										@else
							      		<input class='upload-pic' type="file" id="pic4" name="lbphoto[4]" style="display:none">
							      		<img src="" alt="点击" onclick="$('input[id=pic4]').click();" class="thumbnail" width="100px" height="100px" style="cursor:pointer">
							      		@endif
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									店铺介绍:
									<textarea class="form-control" rows="4" name="referral">{{$user->referral}}</textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									付款说明:
									<textarea class="form-control" rows="4" name="pay">{{$user->pay}}</textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12" name="delivery">
									配送说明:
									<textarea class="form-control" name="delivery" rows="4">{{$user->delivery}}</textarea>
								</div>
							</div>
					</div>
		            <div class="col-sm-8 col-sm-offset-2">
		              <button type="submit" class="btn btn-primary col-md-12">提交</button>
		            </div>
		        </form>
            </div>

        </div>
       
        
    @stop
    {{-- Javascript --}}
	@section('scripts')
		@parent
	    {!! Html::script('/js/vendor/deleted/jquery.min.js') !!}
	    <script>
            //图片上传事件
            $(".upload-pic").change(function () {
            	uploadPic(this.files[0],$(this));
            });

	        function uploadPic(a,b){
                var reader = new FileReader();
                reader.readAsDataURL(a);
                //监听文件读取结束后事件
                reader.onloadend = function (e) {
   					$(b).next('img').attr('src',e.target.result);
                };
	        };

	    </script>
	@stop
@stop
@section('before.angular') ngModules.push('angularFileUpload'); @stop