@extends('layouts.master')

@section('body')
	<div class = "row">
		<div id = "threads-list" class = "col-md-10">
			
			 {{$content}}
			
		</div>
		<div id = "sidebar" class = "col-md-2">
			{{HTML::link('question/new',"New question",['class' => 'btn btn-danger btn-new-thread'])}}

		        <div class="dropdown" style = "margin-top: 10px;">
		           <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
				    View by tag
				    <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{URL::route('home.tag','statprob')}}">statprob</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{URL::route('home.tag','pok')}}">pok</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{URL::route('home.tag','ppw')}}">ppw</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{URL::route('home.tag','matdas2')}}">matdas2</a></li>
				  </ul>
		        </div>
		      
		</div>
	</div>
@stop