@extends('layouts.master')

@section('body')
	<div class = "row">
		<div id = "threads-list" class = "col-md-10">
			
			 {{$content}}
			
		</div>
		<div id = "sidebar" class = "col-md-2">
			{{HTML::link('thread/new',"New question",['class' => 'btn btn-danger '])}}
		</div>
	</div>
@stop