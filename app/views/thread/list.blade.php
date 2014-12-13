@if(!empty($notFound))
<p>Sorry nothing found for your query!</p>
@else
@foreach($threads as $thread)
    <article class="post">
        <header class="post-header">
            <h1 class = "upvotes" id = "upvotes-{{$thread->id}}">
                {{$thread->vote}}
            </h1>
            <button onclick = "vote({{$thread->id}},1)"> upvote </button> 
            <button onclick = "vote({{$thread->id}},-1)"> downvote </button>
            <h1 class="post-title">
                {{link_to_route('thread.show',$thread->judul,$thread->id)}}
            </h1>
            <div class="clearfix poster-list">
                Posted on <span class="left date">{{explode(' ',$thread->created_at)[0]}}</span>
                by <a class = "username"> @if ($thread->user_id == 0)
                    Anonymous
                @else
                {{ User::whereId($thread->user_id)->get()[0]->username }}
                @endif
                </a>
            </div>
        </header>
        
        <footer class="post-footer">
            <hr>
        </footer>
    </article>
@endforeach
{{$threads->links()}}
@endif