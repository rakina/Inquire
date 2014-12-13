<!doctype html>
<html>
<head>
	<meta charset = "UTF-8">
	<title></title>
	@section('head')

		{{--<style>
			@import url(//fonts.googleapis.com/css?family=Lato:700);

			body {
				margin:0;
				font-family:'Lato', sans-serif;
				text-align:center;
				color: #999;
			}

			.welcome {
				width: 300px;
				height: 200px;
				position: absolute;
				left: 50%;
				top: 50%;
				margin-left: -150px;
				margin-top: -100px;
			}

			a, a:visited {
				text-decoration:none;
			}

			h1 {
				font-size: 32px;
				margin: 16px 0 0 0;
			}
		</style>--}}
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<link rel = "stylesheet" href = "{{asset('css/style.css')}}"/>
		<script src="{{asset('js/jquery.min.js')}}"></script>
		<script>
		function vote(id,type){
			@if (Auth::user())
			@else
				return;
			@endif
			if (type > 0) type = 1;
			else type = -1;
			$.ajax({
	            type: 'POST',
	            url: 'vote',
	            data: { id: id, type:type }
	        }).done(function(msg){
	        	
	           $("#upvotes-"+id).html(msg);
	        });
		}
	</script>
	@show
</head>
<body>
	<ul>
		<li> {{ link_to_route('home',"Home")}} </li>
		<li>{{ "Hello ".(Auth::user()?(Auth::user()->username):"Guest")}} </li>
		<li> {{ link_to_route((Auth::user()?'logout':"login"),Auth::user()?'logout':"login")}} </li>
		
	</ul>
    @yield('body')
</body>
</html>