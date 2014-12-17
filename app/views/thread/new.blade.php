@extends('layouts.master')
@section('body')
	<div class = "row">
		<h2 class="new-post col-md-11 col-md-offset-1">
		     <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
		     Ask a Question
		    {{ HTML::link('home','cancel',['class' => 'btn btn-danger ']) }}
		</h2>
		
		
			
		<div class = "col-md-9 col-md-offset-1">
			{{ Form::open(['route'=>['thread.submit'],'files'=>true ]) }}

			<div class="form-group">
			    
			        {{ Form::label('title','Title') }}
			        {{ Form::text('title',Input::old('title'),array('id'=>'','class'=>'form-control')) }}
			    
			</div>
			<div class="form-group">
			    
			        {{ Form::label('content','Content') }}
			        {{ Form::textarea('content',Input::old('content'),['rows'=>5,'class'=>'ckeditor form-control','id'=>'content']) }}
			    
			</div>
			<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'content' );
            </script>
			<div class = "form-group">
				{{ Form::label('content','Tag') }}
				{{ Form::select('tag', array(
				'general' => 'GENERAL',
				'statprob' => 'STATPROB',
				'ppw' => 'PPW',
				'pok' => 'POK',
				'matdas2' => 'MATDAS2',
				'matdis2' => 'MATDIS2'
				), 'general') }}
			</div>
			<div class="checkbox">
			    <label>
			        {{ Form::checkbox('anonymity',Input::old('anonymity')) }}
			        	Ask anonymously
			   </label>
			</div>
			<div class="form-group">
			    
			        {{ Form::label('file','Attachment',array('id'=>'','class'=>'')) }}
		  			{{ Form::file('file','',array('id'=>'','class'=>'form-control')) }}
			  
			</div>
			@if($errors->has())
			<div data-alert class="alert alert-danger">
			@foreach($errors->all() as $error)
			
			    {{$error}}<br>
			
			@endforeach
			</div>
			@endif
			{{ Form::submit('Submit',['class'=>'btn btn-default']) }}
			{{ Form::close() }}
		</div>
	</div>
@stop