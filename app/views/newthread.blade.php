@extends('layouts.master')
@section('body')

	<h2 class="new-post">
	    Add New Thread
	    <span class="right">{{ HTML::link('home','cancel',['class' => 'button tiny radius']) }}</span>
	</h2>
	<hr>
	<p>
			{{ $errors->first('title') }}
			{{ $errors->first('content') }}
			{{ $errors->first('file') }}
		</p>
	{{ Form::open(['route'=>['thread.submit'],'files'=>true ]) }}

	<div class="row">
	    <div class="small-5 large-5 column">
	        {{ Form::label('title','Thread Title:') }}
	        {{ Form::text('title',Input::old('title')) }}
	    </div>
	</div>
	<div class="row">
	    <div class="small-7 large-7 column">
	        {{ Form::label('content','Content:') }}
	        {{ Form::textarea('content',Input::old('content'),['rows'=>5]) }}
	    </div>
	</div>
	<div class="row">
	    <div class="small-5 large-5 column">
	        {{ Form::label('file','File',array('id'=>'','class'=>'')) }}
  			{{ Form::file('file','',array('id'=>'','class'=>'')) }}
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

@stop