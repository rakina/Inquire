@extends('layouts.master')
@section('head')
		<link href="{{asset('css/404.css')}}" rel="stylesheet">

@stop
@section('nav')
@stop
@section('body')
<div style = "text-align:center;"> 
	<div><img src = "{{asset('img/Snorlax.png')}}"/></div>

    <div>
        <img id = 'poke' src = "{{asset('img/pokeball.png')}}"/> 
        <h1>404</h1> 
         <img id = 'poke' src = "{{asset('img/pokeball.png')}}"/>
    </div>
    <p>
        Drat! A wild snorlax blocks your path. <br>
        Unless you have the Pokeflute with you, we don't have much to do.
    </p>

    <a href = "{{URL::route('home')}}" class="btn btn-warning">Home</a>
</div>
@stop