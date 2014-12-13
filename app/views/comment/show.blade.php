@if(!empty($notFound))
<p>Sorry nothing found for your query!</p>
@else
@foreach($comments as $comment)
    <article class="post">
        <header class="post-header">
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
    </article>
@endforeach
@endif