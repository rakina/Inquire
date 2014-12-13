@extends('layouts.master')
@section('body')
	<div id = "thread">
		{{$thread->judul}}
		
		<hr>
		{{$thread->isi}}
		@if($thread->file_url)
			{{HTML::link($thread->file_url,"Attached file")}}
		@endif
	</div>
	<div id = "comments">
		{{$commentscontent}}
	</div>
@stop