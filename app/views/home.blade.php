@extends('layouts.master')
@section('body')
	{{ "Hello ".(Auth::user()?(Auth::user()->username):"Guest")}}
	<a href = {{URL::to((Auth::user()?'logout':"login"))}}> {{(Auth::user()?'logout':"login")}} </a>
	<div class="welcome">
		 {{$content}}
	</div>
@stop