@extends('layouts.master')
@section('body')
	{{View::make('thread.header')->with(array('thread'=>$thread,'content'=>$thread->isi))}}
		
		@if($thread->file_url)
			{{HTML::link($thread->file_url,"Attached file")}}
		@endif
	</div>
	<div class = "row" id = "newcomment">
		<div class = "col-md-5">
			{{ Form::open(['route'=>['comment.submit']]) }}
				{{Form::hidden('thread',$thread->id)}}
				<div class="form-group">
				    
				        {{ Form::label('content','Content:') }}
				        {{ Form::textarea('content',Input::old('content'),['rows'=>5,'class'=>'form-control']) }}
				    
				</div>
				<div class="checkbox">
				    <label>
				        {{ Form::checkbox('anonymity',Input::old('anonymity')) }}
				        	Post anonymously
				   </label>
				</div>
				
				@if($errors->has())
				@foreach($errors->all() as $error)
				<div data-alert class="alert-box warning round">
				    {{$error}}
				    <a href="#" class="close">&times;</a>
				</div>
				@endforeach
				@endif
				{{ Form::submit('Submit',['class'=>'btn btn-default']) }}
			{{ Form::close() }}
		</div>
		
	</div>
	<div id = "comments">
		{{$commentscontent}}
	</div>
@stop