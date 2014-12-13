@if(!empty($notFound))
<p>Sorry nothing found for your query!</p>
@else
@foreach($threads as $thread)
        {{View::make('thread.header')->with('thread',$thread)}}
@endforeach
{{$threads->links()}}
@endif