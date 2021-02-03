
@extends('szy.auth.log_reg')

@section('title')
用户登录 
@stop

@section('content')

	<form action="/login" name='loginForm' method="POST">
		{{ csrf_field() }}
	<li class="border">用户登录</li>
	<li><div class="user-s"><div></div></div><input class="user-i" type="text" name="email"></li>
	<li><div class="pass-s"><div></div></div><input class="pass-i" type="password" name="password"></li>
	<li><button class="submit">登录</button></li>
	<li>
	<span class='check'><input type="checkbox" name="remember">记住用户名</span> 
	<span class="register"><a href="register">免费注册</a></span>
	<span class="wj"><a href="{{ url('/password/reset') }}">忘记密码</a> |</span>
	</li>
	</form>
@stop
