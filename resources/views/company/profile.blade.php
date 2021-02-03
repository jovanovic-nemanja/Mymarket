<div class="row">&nbsp;</div>
<div class="row">
	<div class="col-md-6">
		<label class="control-label">{{ trans('company.company_name')}}:</label>
		{!! Form::text('name',null,['class'=>'form-control']) !!}
	</div>
	<div class="col-md-6">
		<label class="control-label">{{ trans('company.website_name')}}:</label>
		{!! Form::text('website_name',null,['class'=>'form-control']) !!}
	</div>
 </div>
<div class="row">
	<div class="col-md-6">
		<label class="control-label">{{ trans('company.slogan')}}:</label>
		{!! Form::text('slogan',null,['class'=>'form-control']) !!}
	</div>
	<div class="col-md-3">
		<label class="control-label">{{ trans('address.phone')}}:</label>
		{!! Form::text('phone_number',null,['class'=>'form-control']) !!}
	</div>
	<div class="col-md-3">
		<label class="control-label">{{ trans('company.cell_phone')}}:</label>
		{!! Form::text('cell_phone',null,['class'=>'form-control']) !!}
	</div>
</div>
{{--
<div class="page-header">
	<h6>{{ trans('address.address')}}</h6>
</div>--}}
<div class="row">
	<div class="col-md-12">
		<label class="control-label">{{ trans('address.address')}}:</label>
		{!! Form::text('address',null,['class'=>'form-control']) !!}
	</div>

	
	<div class="col-md-4">
		<label class="control-label">{{ trans('address.city')}}:</label>
		{!! Form::text('city',null,['class'=>'form-control']) !!}
	</div>
	<div class="col-md-4">
		<label class="control-label">{{ trans('address.state')}}:</label>
		{!! Form::text('state',null,['class'=>'form-control']) !!}
	</div>
		<div class="col-md-4">

		<label class="control-label">{{ trans('address.zipcode')}}:</label>
		{!! Form::text('zip_code',null,['class'=>'form-control']) !!}
	</div>
</div>

{{--
	<div class="row">
		<div class="col-md-6">
			<label class="control-label">{{ trans('company.google_maps_key_api')}}:
				<a href="https://developers.google.com/maps/documentation/embed/guide#api_key" target="_blank">
					<span class="glyphicon glyphicon-question-sign"></span>
				</a>
			</label>
			{!! Form::text('google_maps_key_api',null,['class'=>'form-control']) !!}
			
		</div>
	</div>
	<div class="page-header">
		<h6>{{ trans('user.social_info')}}</h6>
	</div> 
	<div class="row">
		<div class="col-md-6">
				<label class="control-label">{{ trans('company.facebook')}}:</label>
				{!! Form::text('facebook',null,['class'=>'form-control']) !!}
		</div>
		<div class="col-md-6">
				<label class="control-label">{{ trans('company.twitter')}}:</label>
				{!! Form::text('twitter',null,['class'=>'form-control']) !!}
		</div>
		<div class="col-md-6">
				<label class="control-label">{{ trans('company.facebook_app_id')}}:
					<a href="https://developers.facebook.com/docs/apps/register" target="_blank">
						<span class="glyphicon glyphicon-question-sign"></span>
					</a>
				</label>
				{!! Form::text('facebook_app_id',null,['class'=>'form-control']) !!}
		</div>
	</div>
--}}
{{--
<div class="page-header">
	<h6>网站图片</h6>
</div>--}}
<div class="row">
	<div class="col-md-12">
			<label class="control-label">网站Logo:</label>
      		<input class='upload-pic' type="file" id="pic_logo" name="logo" style="display:none">
      		@if(!empty($company->logo))
			<img src="{{$company->logo}}" alt="点击" class="thumbnail" onclick="$('input[id=pic_logo]').click();" width="140px" height="140px" style="cursor:pointer">
			@else
			<img src="img/no-img.png" alt="点击" class="thumbnail" onclick="$('input[id=pic_logo]').click();" width="140px" height="140px" style="cursor:pointer">
			@endif
	</div>
	<label class="control-label"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;网站轮播图:</label>
	<div class="col-md-12">
		<div class="col-md-2">
			<div class="input-group col-md-2">
	      		<input class='upload-pic' type="file" id="pic0" name="lbphoto[0]" style="display:none">
	      		@if(!empty($company->lbs[0]))
	      		<img src="{{$company->lbs[0]}}" alt="点击" class="thumbnail" onclick="$('input[id=pic0]').click();" width="100px" height="100px" style="cursor:pointer">
	      		@else
	      		<img src="img/no-img.png" alt="点击" class="thumbnail" onclick="$('input[id=pic0]').click();" width="100px" height="100px" style="cursor:pointer">
	      		@endif
			</div>
		</div>
		<div class="col-md-2">
			<div class="input-group col-md-2">
	      		<input class='upload-pic' type="file" id="pic1"  name="lbphoto[1]" style="display:none">
	      		@if(!empty($company->lbs[1]))
	      		<img src="{{$company->lbs[1]}}" alt="点击" class="thumbnail" onclick="$('input[id=pic1]').click();" width="100px" height="100px" style="cursor:pointer">
				@else
	      		<img src="img/no-img.png" alt="点击" class="thumbnail" onclick="$('input[id=pic1]').click();" width="100px" height="100px" style="cursor:pointer">
				@endif
			</div>
		</div>
		<div class="col-md-2">
			<div class="input-group col-md-2">
	      		@if(!empty($company->lbs[2]))
	      		<input class='upload-pic' type="file" id="pic2" name="lbphoto[2]" value="{{$company->lbs[2]}}" style="display:none">
	      		<img src="{{$company->lbs[2]}}" alt="点击" class="thumbnail" onclick="$('input[id=pic2]').click();" width="100px" height="100px" style="cursor:pointer">
				@else
	      		<input class='upload-pic' type="file" id="pic2" name="lbphoto[2]" style="display:none">
	      		<img src="img/no-img.png" alt="点击" class="thumbnail" onclick="$('input[id=pic2]').click();" width="100px" height="100px" style="cursor:pointer">
	      		@endif
			</div>
		</div>
		<div class="col-md-2">
			<div class="input-group col-md-2">
	      		@if(!empty($company->lbs[3]))
	      		<input class='upload-pic' type="file" id="pic3" value="{{$company->lbs[3]}}"  name="lbphoto[3]" style="display:none">
	      		<img src="{{$company->lbs[3]}}" alt="点击" onclick="$('input[id=pic3]').click();" class="thumbnail" width="100px" height="100px" style="cursor:pointer">
				@else
	      		<input class='upload-pic' type="file" id="pic3"  name="lbphoto[3]" style="display:none">
	      		<img src="img/no-img.png" alt="点击" onclick="$('input[id=pic3]').click();" class="thumbnail" width="100px" height="100px" style="cursor:pointer">
	      		@endif
			</div>
		</div>
		<div class="col-md-2">
			<div class="input-group col-md-2">
	      		@if(!empty($company->lbs[4]))
	      		<input class='upload-pic' type="file" id="pic4" name="lbphoto[4]" value="{{$company->lbs[4]}}" style="display:none">
	      		<img src="{{$company->lbs[4]}}" alt="点击" onclick="$('input[id=pic4]').click();" class="thumbnail" width="100px" height="100px" style="cursor:pointer">
				@else
	      		<input class='upload-pic' type="file" id="pic4" name="lbphoto[4]" style="display:none">
	      		<img src="img/no-img.png" alt="点击" onclick="$('input[id=pic4]').click();" class="thumbnail" width="100px" height="100px" style="cursor:pointer">
	      		@endif
			</div>
		</div>
	</div>
</div>
<div class="row">&nbsp;</div>
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
