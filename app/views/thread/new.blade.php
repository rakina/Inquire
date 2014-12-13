@extends('layouts.master')
@section('body')
	<div class = "row">
		<h2 class="new-post col-md-11 col-md-offset-1">
		     <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Add New Thread
		    {{ HTML::link('home','cancel',['class' => 'btn btn-danger ']) }}
		</h2>
		
		
			@if($errors->has())
			<div class="alert alert-danger" role="alert">
				{{ $errors->first('title') }}
				{{ $errors->first('content') }}
				{{ $errors->first('file') }}
			</div>
			@endif
		<div class = "col-md-9 col-md-offset-1">
			{{ Form::open(['route'=>['thread.submit'],'files'=>true ]) }}

			<div class="form-group">
			    
			        {{ Form::label('title','Thread Title:') }}
			        {{ Form::text('title',Input::old('title'),array('id'=>'','class'=>'form-control')) }}
			    
			</div>
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
			<div class="form-group">
			    
			        {{ Form::label('file','Attachment',array('id'=>'','class'=>'')) }}
		  			{{ Form::file('file','',array('id'=>'','class'=>'form-control')) }}
			  
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
@stop