@extends('layouts.master')
@section('body')
	{{View::make('thread.header')->with(array('thread'=>$thread,'content'=>$thread->isi))}}

	<div class = "row" id = "newcomment">
		<div class = "col-md-5">
			{{ Form::open(['route'=>['comment.submit']]) }}
				{{Form::hidden('thread',$thread->id)}}
				<div class="form-group">
				    
				        {{ Form::label('content','Add an answer:') }}
				        {{ Form::textarea('content',Input::old('content'),['rows'=>5,'class'=>'form-control']) }}
				    
				</div>
				<div class="checkbox">
				    <label>
				        {{ Form::checkbox('anonymity',Input::old('anonymity')) }}
				        	Answer anonymously
				   </label>
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
	<div id = "comments">
		{{$commentscontent}}
	</div>
@stop