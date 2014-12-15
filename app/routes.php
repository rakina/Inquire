<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::model('thread','Thread');




// Secure-Routes
Route::group(array('before' => 'auth'), function()
{
	Route::get('logout',['as' => 'logout', 'uses' => 'HomeController@doLogout']);

	Route::get('/thread/new',['as' => 'thread.new','uses' => function(){
		return View::make("thread.new");
	}]);
	Route::post('/thread/new',['as' => 'thread.submit','uses' => 'ThreadController@newThread']);
	
	Route::post('vote',['as'=>'thread.vote','uses'=>'ThreadController@voteThread']);
	Route::post('voteComment',['as'=>'comment.vote','uses'=>'ThreadController@voteComment']);
	Route::post('/thread/comment',['as' => 'comment.submit','uses' => 'ThreadController@newComment']);

	

});


Route::get('/thread/{thread}',['as' => 'thread.show','uses' => 'ThreadController@showThread']);

Route::get('/', function()
{
	Redirect::route("home");
});



Route::get('/login', ['as' => 'login', 'uses' =>function()
{
	if (Auth::user()) return Redirect::route("home");
	return View::make('login');
}]);

Route::post('/login',  'HomeController@doLogin');
Route::get('home', ['as' => 'home','uses' =>'HomeController@showHome']);
Route::get('home/{tag}', ['as' => 'home.tag','uses' =>'HomeController@showHomeTag']);

