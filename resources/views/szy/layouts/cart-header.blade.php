
@include('szy.layouts.top')
	<div class="top">
		<a href="{{url('')}}"><img src="img/szy/inc/logo2.png" alt="" class="logo"></a>
		<div class="search">
			<button type="button" onclick="search();">搜索</button>
			<input type="text" id="home_search" value="@if(isset($_GET['search'])){{$_GET['search']}}@endif">
			<ul>

			@if(!empty($sells) && isset($sells))
				@foreach($sells as $sell)
				<li class="product-list">
					<a href="">{{$sell->name}}</a>
				</li>&nbsp;
				@endforeach
			@endif
			</ul>
		</div>
	</div>



