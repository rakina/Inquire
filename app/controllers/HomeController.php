<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}


	public function showHome()
	{
		$threads = Thread::orderBy('vote','desc')->paginate(5);
        return  View::make('home')->nest('content','thread.list',compact('threads'));
		//View::make('home');
	}
	public function showHomeTag($tag)
	{
		$threads = Thread::orderBy('vote','desc')->whereTag($tag)->paginate(5);
        return  View::make('home')->nest('content','thread.list',compact('threads'));
		//View::make('home');
	}
	public function doLogin()
	{
		
		// process the form
		$rules = array('username'=>'required|alphanum','password'=>'required');
		$validator = Validator::make(Input::all(), $rules);
		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::route('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'username' 	=> Input::get('username'),
				'password' 	=> Input::get('password')
			);

			// attempt to do the login
			if (Auth::attempt($userdata)) {

				// validation successful!
				// redirect them to the secure section or whatever
				// return Redirect::to('secure');
				// for now we'll just echo success (even though echoing in a controller is bad)
				echo Auth::user()->username;
				return Redirect::route('home')->with('flash_notice', 'You have successfully logged in.');

			} else {	 	

				// validation not successful, send back to form	
				return Redirect::route('login')->withErrors(array("gabisa" => "Wrong username or password."));

			}

		}
	}

	public function doLogout(){
		Auth::logout();
		return Redirect::back()->with('flash_notice', 'You have successfully logged out.');
	}
}	
