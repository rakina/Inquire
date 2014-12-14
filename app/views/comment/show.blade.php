@if(!empty($notFound))
<p>Sorry nothing found for your query!</p>
@else
@foreach($comments as $comment)
    <div class="comment-header">
         <div class = "kiri"> 
            @if(Auth::user() && count($comment->votes()->whereUserId(Auth::user()->id)->get())  > 0)
                <?php $currentVote = $comment->votes()->whereUserId(Auth::user()->id)->get()[0]->type ?>
            @else
                <?php $currentVote = 0; ?>
            @endif
            <button class = "c-voteBtn {{($currentVote==1)?'voted':''}}" id = "c-upBtn-{{$comment->id}}" onclick = "voteComment({{$comment->id}},1,{{$currentVote}})"> 
                <span class="glyphicon glyphicon-arrow-up" aria-hidden="true">
            </span> </button>        
            <h3 class = "c-upvotes {{($currentVote == 1)?'current':''}}" id = "c-upvotes-{{$comment->id}}">
                    {{$comment->vote+1-$currentVote}}
            </h3>
            <h3 class = "c-upvotes {{ ($currentVote == 0)?'current':'' }}" id = "c-novotes-{{$comment->id}}">
                    {{$comment->vote-$currentVote}}
            </h3>
            <h3 class = "c-upvotes {{($currentVote == -1)?'current':''}}" id = "c-downvotes-{{$comment->id}}">
                    {{$comment->vote-1-$currentVote}}
            </h3>
            <button class = "c-voteBtn {{($currentVote==-1)?'voted':''}}" id = "c-downBtn-{{$comment->id}}" onclick = "voteComment({{$comment->id}},-1,{{$currentVote}})"> <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span> </button>
        </div>
        <header class="comment-header">
            {{$comment->isi}}
            <div class="clearfix">
                 Posted on <span class="left date">{{explode(' ',$comment->created_at)[0]}}</span>
                by <a class = "username"> @if ($comment->user_id == 0)
                    Anonymous
                @else
                {{ User::whereId($comment->user_id)->get()[0]->username }}
                @endif
                </a>
            </div>
        </header>
        
        <footer class="post-footer">
            <hr>
        </footer>
    </div>
@endforeach
@endif