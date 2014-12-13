@if(!empty($notFound))
<p>Sorry nothing found for your query!</p>
@else
@foreach($threads as $thread)
    <article class="post">
        <header class="post-header">
            <h1 class="post-title">
                {{link_to_route('thread.show',$thread->judul,$thread->id)}}
            </h1>
            <div class="clearfix">
                <span class="left date">{{explode(' ',$thread->created_at)[0]}}</span>
            </div>
        </header>
        
        <footer class="post-footer">
            <hr>
        </footer>
    </article>
@endforeach
{{$threads->links()}}
@endif