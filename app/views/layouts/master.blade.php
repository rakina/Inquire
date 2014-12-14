<!doctype html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Inquire</title>
	@section('head')

		
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<link rel = "stylesheet" href = "{{asset('css/style.css')}}"/>
		<script src="{{asset('js/jquery.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		@if (Auth::user())
			<script>
				function vote(id,type,currentVote){
					if (type > 0) type = 1;
					else type = -1;
					if (type == currentVote) return;
					$.ajax({
					        type: 'POST',
					        url: '{{URL::to("vote")}}',
					        data: { id: id, type:type, current:currentVote}
					    }).done(function(msg){
						    alert(msg);
						    $("#upvotes-"+id).removeClass("current");
							$("#novotes-"+id).removeClass("current");
							$("#downvotes-"+id).removeClass("current");
							$("#upBtn-"+id).removeClass("voted");
							$("#downBtn-"+id).removeClass("voted");
							if (type == 1){
								$("#upvotes-"+id).addClass("current");
								$("#upBtn-"+id).addClass("voted");
							}
							else{
								$("#downvotes-"+id).addClass("current");
								$("#downBtn-"+id).addClass("voted");
							}
							$("#upBtn-"+id).attr("onclick","vote("+id+",1,"+type+")");
							$("#downBtn-"+id).attr("onclick","vote("+id+",-1,"+type+")");
						});
				}
				function voteComment(id,type,currentVote){
					
					if (type > 0) type = 1;
					else type = -1;
					if (type == currentVote) return;
					alert("yoi2");
					$.ajax({
					        type: 'POST',
					        url: '{{URL::to("voteComment")}}',
					        data: { id: id, type:type, current:currentVote}
					    }).done(function(msg){
						    alert(msg);
						    $("#c-upvotes-"+id).removeClass("current");
							$("#c-novotes-"+id).removeClass("current");
							$("#c-downvotes-"+id).removeClass("current");
							$("#c-upBtn-"+id).removeClass("voted");
							$("#c-downBtn-"+id).removeClass("voted");
							if (type == 1){
								$("#c-upvotes-"+id).addClass("current");
								$("#c-upBtn-"+id).addClass("voted");
							}
							else{
								$("#c-downvotes-"+id).addClass("current");
								$("#c-downBtn-"+id).addClass("voted");
							}
							$("#c-upBtn-"+id).attr("onclick","voteComment("+id+",1,"+type+")");
							$("#c-downBtn-"+id).attr("onclick","voteComment("+id+",-1,"+type+")");
						});
				}
			</script>
		@endif
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