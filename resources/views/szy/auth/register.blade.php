@extends('szy.auth.log_reg')

@section('title')
用户注册 
@stop

@section('content')
	<form action="/register" class='form-horizontal' method="POST">
		{{ csrf_field() }}

	<li class="border">欢迎注册 <div>已注册 <a href="login">可直接登录</a></div></li>
	<li><div class="user-s"><div></div></div><input class="user-i" type="text" name="email"  placeholder=" 请输入邮箱"></li>
	<li><div class="pass-s"><div></div></div><input class="pass-i" type="password" name="password"  placeholder=" 建议两种字符结合"></li>
	{{--<li><div class="pass-s"><div></div></div><input class="pass-i" type="password" name=""  placeholder=" 请再次输入密码"></li>--}}
	<li><button class="submit">立即注册</button></li>
	</form>
@stop
 {{-- end content --}}
