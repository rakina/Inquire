@extends('layouts.master')
@section('body')
	<div id = "thread">
		{{$thread->judul}}
		
		<hr>
		{{$thread->isi}}
		@if($thread->file_url)
			{{HTML::link($thread->file_url,"Attached file")}}
		@endif
	</div>
	<div id = "newcomment">
		{{ Form::open(['route'=>['comment.submit']]) }}
			 {{Form::hidden('thread',$thread->id)}}
			<div class="row">
			    <div class="small-7 large-7 column">
			        {{ Form::label('content','Content:') }}
			        {{ Form::textarea('content',Input::old('content'),['rows'=>5]) }}
			    </div>
			</div>
			<div class="row">
			    <div class="small-7 large-7 column">
			        {{ Form::label('anonymity','Post anonymously:') }}
			        {{ Form::checkbox('anonymity',Input::old('anonymity')) }}
			    </div>
			</div>
			
			@if($errors->has())
			@foreach($errors->all() as $error)
			<div data-alert class="alert-box warning round">
			    {{$error}}
			    <a href="#" class="close">&times;</a>
			</div>
			@endforeach
			@endif
			{{ Form::submit('Submit',['class'=>'button tiny radius']) }}
		{{ Form::close() }}
	</div>
	<div id = "comments">
		{{$commentscontent}}
	</div>
@stop