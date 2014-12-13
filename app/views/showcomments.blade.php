@if(!empty($notFound))
<p>Sorry nothing found for your query!</p>
@else
@foreach($comments as $comment)
    <article class="post">
        <header class="post-header">
            {{$comment->isi}}
            <div class="clearfix">
                <span class="left date">{{explode(' ',$comment->created_at)[0]}}</span>
            </div>
        </header>
        
        <footer class="post-footer">
            <hr>
        </footer>
    </article>
@endforeach
@endif