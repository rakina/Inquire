@extends('layouts.master')
@section('body')
	{{View::make('thread.header')->with(array('thread'=>$thread,'content'=>$thread->isi))}}

	<div class = "row" id = "newcomment">
		<div class = "col-md-10">
			<div class = "col-md-5 col-md-offset-1">
				{{ Form::open(['route'=>['comment.submit']]) }}
					{{Form::hidden('thread',$thread->id)}}
					<div class="form-group">
					    
					        {{ Form::label('ccontent','Add an answer') }}
					        {{ Form::textarea('ccontent',Input::old('content'),['rows'=>3,'class'=>'form-control']) }}
					    
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
			<div class = "col-md-11 " id = "comments">
				{{$commentscontent}}
			</div>
			
		</div>

	</div>
	
@stop