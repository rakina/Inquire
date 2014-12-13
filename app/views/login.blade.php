@extends('layouts.master')
@section('body')
	
	{{ Form::open(array('url' => 'login')) }}
		<h1>Login</h1>

		<!-- if there are login errors, show them here -->
		@if($errors->has())
			<div class="alert alert-danger" role="alert">
				{{ $errors->first('username') }}
				{{ $errors->first('password') }}
				{{ $errors->first('gabisa') }}
			</div>
		@endif
		<p>
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username', Input::old('username')) }}
		</p>

		<p>
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password') }}
		</p>

		<p>{{ Form::submit('Submit!') }}</p>
	{{ Form::close() }}
@stop
