@extends('layouts.master')
@section('body')
	{{link_to_route('thread.new',"New thread")}}
	<div class="welcome">
		 {{$content}}
	</div>
@stop