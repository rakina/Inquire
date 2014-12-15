<!doctype html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Inquire</title>
	@section('head')

		
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<script src="{{asset('js/jquery.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		
		<link rel = "stylesheet" href = "{{asset('css/style.css')}}"/>
		@if (Auth::user())
			<script>
				function vote(id,type,currentVote){
					if (type > 0) type = 1;
					else type = -1;
					if (currentVote > 0) currentVote = 1;
					else if (currentVote < 0) currentVote = -1;
					if (currentVote == type){
						type = 0;
					}
					$("#upvotes-"+id).removeClass("current");
					$("#novotes-"+id).removeClass("current");
					$("#downvotes-"+id).removeClass("current");
					$("#upBtn-"+id).removeClass("voted");
					$("#downBtn-"+id).removeClass("voted");
					if (type == 1){
					$("#upvotes-"+id).addClass("current");
					$("#upBtn-"+id).addClass("voted");
					}
					else if (type == -1){
						$("#downvotes-"+id).addClass("current");
						$("#downBtn-"+id).addClass("voted");
					} else{
						$("#novotes-"+id).addClass("current");
					}

					$("#upBtn-"+id).attr("onclick","vote("+id+",1,"+type+")");
					$("#downBtn-"+id).attr("onclick","vote("+id+",-1,"+type+")");
					$.ajax({
					        type: 'POST',
					        url: '{{URL::to("vote")}}',
					        data: { id: id, type:type, current:currentVote}
					    }).done(function(msg){
						   alert("hehe");
						    
						});
				}
				function voteComment(id,type,currentVote){
					
					if (type > 0) type = 1;
					else type = -1;
					if (type == currentVote) return;
					
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
					$.ajax({
					        type: 'POST',
					        url: '{{URL::to("voteComment")}}',
					        data: { id: id, type:type, current:currentVote}
					    }).done(function(msg){
						  
						   
						});
				}
			</script>
		@else
			<script>
				function vote(a,b,c){
					alert("You need to be logged in to vote.");
				}
				function voteComment(a,b,c){
					alert("You need to be logged in to vote.");
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

      <a class="navbar-brand" href="{{URL::to('home')}}">
      	<img id = "brand-img" alt="Brand" src="{{asset('inquire.png')}}">
      	Inquire
      </a>
    </div>
    
   
     
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>

          	{{ "Hello, ".(Auth::user()?(Auth::user()->username):"Guest")}} <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
				
            
           <li>

            {{ link_to_route((Auth::user()?'logout':"login"),(Auth::user()?'Logout':"Login"))}} </li>
  
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	@if(Session::get('flash_notice'))
	<div class = "row">
		<div class = "col-md-offset-4 col-md-4">
		<div class="alert alert-success" role="alert">{{Session::get('flash_notice')}}</div>
	</div>
	@endif
    @yield('body')
</body>
</html>