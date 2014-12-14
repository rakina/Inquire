<div class="thread-header">
        <div class = "kiri"> 
            @if(Auth::user() && count($thread->votes()->whereUserId(Auth::user()->id)->get())  > 0)
                <?php $currentVote = $thread->votes()->whereUserId(Auth::user()->id)->get()[0]->type ?>
            @else
                <?php $currentVote = 0; ?>
            @endif
            <button class = "voteBtn {{($currentVote==1)?'voted':''}}" id = "upBtn-{{$thread->id}}" onclick = "vote({{$thread->id}},1,{{$currentVote}})"> 
                <span class="glyphicon glyphicon-arrow-up" aria-hidden="true">
            </span> </button>        
            <h3 class = "upvotes {{($currentVote == 1)?'current':''}}" id = "upvotes-{{$thread->id}}">
                    {{$thread->vote+1-$currentVote}}
            </h3>
            <h3 class = "upvotes {{ ($currentVote == 0)?'current':'' }}" id = "novotes-{{$thread->id}}">
                    {{$thread->vote-$currentVote}}
            </h3>
            <h3 class = "upvotes {{($currentVote == -1)?'current':''}}" id = "downvotes-{{$thread->id}}">
                    {{$thread->vote-1-$currentVote}}
            </h3>
            <button class = "voteBtn {{($currentVote==-1)?'voted':''}}" id = "downBtn-{{$thread->id}}" onclick = "vote({{$thread->id}},-1,{{$currentVote}})"> <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span> </button>
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
                        @if($thread->file_url)
                            <div class = "attachment">
                                <span class="glyphicon glyphicon-file" aria-hidden="true"></span> 
                                {{HTML::link($thread->file_url,"Attached file")}}
                            </div>
                        @endif
                    </div>

                    @endif
                </div>

            </div>
        </div>                
        