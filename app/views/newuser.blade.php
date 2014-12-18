@extends('layouts.master')
@section('body')
	<div class = "row">
		<div class = "col-md-offset-4 col-md-4">
	{{ Form::open(array('url' => 'newuser')) }}
		<h1>Create a new user</h1>

		<!-- if there are login errors, show them here -->
		@if($errors->has())
			<div class="alert alert-danger" role="alert">
				{{ $errors->first('username') }}
				{{ $errors->first('password') }}
				{{ $errors->first('password2') }}
			</div>
		@endif
		<div class="form-group">
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username', Input::old('username'),array('class'=>'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', array('class'=>'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('password2', 'Retype Password') }}
			{{ Form::password('password2', array('class'=>'form-control')) }}
		</div>
		{{ Form::submit('Register!',['class'=>'btn btn-default']) }}
	{{ Form::close() }}
	</div>
</div>
@stop
