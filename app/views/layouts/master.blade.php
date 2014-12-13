<!doctype html>
<html>
<head>
	<meta charset = "UTF-8">
	<title></title>
	@section('head')

		
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<link rel = "stylesheet" href = "{{asset('css/style.css')}}"/>
		<script src="{{asset('js/jquery.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
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
	            url: '{{URL::to("vote")}}',
	            data: { id: id, type:type }
	        }).done(function(msg){
	        	
	           $("#upvotes-"+id).html(msg);
	        });
		}
	</script>
	@show
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{URL::to('home')}}">Inquire</a>
    </div>

   
     
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ "Hello, ".(Auth::user()?(Auth::user()->username):"Guest")}} <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
				
            <li class="divider"></li>
           <li> {{ link_to_route((Auth::user()?'logout':"login"),Auth::user()?'Logout':"Login")}} </li>
		
  
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	@if(Session::get('flash_notice'))

		<div class="alert alert-success" role="alert">{{Session::get('flash_notice')}}</div>
	@endif
    @yield('body')
</body>
</html>