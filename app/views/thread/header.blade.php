<div class="thread-header">
    <div class = "kiri">
        <button onclick = "vote({{$thread->id}},1)"> <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span> </button> 
                <h3 class = "upvotes" id = "upvotes-{{$thread->id}}">
                    {{$thread->vote}}
                </h3>
                <button onclick = "vote({{$thread->id}},-1)"> <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span> </button>
            </div>
            <div  class = "kanan">
                <h2 class="thread-title">
                    {{link_to_route('thread.show',$thread->judul,$thread->id)}}
                    <span class="label label-default">{{$thread->tag}}</span>
                </h2>  
                <div class="clearfix poster-list">
                    Posted on <span class="left date">{{explode(' ',$thread->created_at)[0]}}</span>
                    by <a class = "username"> @if ($thread->user_id == 0)
                        Anonymous
                    @else
                    {{ User::whereId($thread->user_id)->get()[0]->username }}
                    @endif
                    </a>
                    @if(isset($content))
                    <div class = "thread-content">
                        {{$content}}
                    </div>
                    @endif
                </div>

            </div>
        </div>                
        