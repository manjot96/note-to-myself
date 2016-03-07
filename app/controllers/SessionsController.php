<?php

class SessionsController extends \BaseController
{
	public function index()
    {
        if (Auth::check()) {
            return "Logged in as " . Auth::user()->emailaddress;
        }else{
            return Redirect::route('sessions.create'); //form
        }
    }
	
	// hello

	
    public function create()
    {
        if(Auth::check()) // opposite of Auth::guest()
        {
            return Redirect::to('/mainpage');
        }
        return View::make('sessions.create'); // form
    }


	public function store()
	{
		// only pass the email address and the password; nothing else
		if(Auth::attempt(Input::only('emailaddress', 'password')))
			// or if(Auth::attempt(['email']=>Input::get('email')))
			// or if(Auth::attempt(Input::all()
		{
			// if everything matches, Laravel will create a session
			// and we can access it via Auth::user()
			return "Logged in as " . Auth::user()->emailaddress;
		}else{
			//return "Unsuccessful login attempt.";
			return Redirect::back()->withInput();
        }
}

	
	public function destroy()
    {
        Auth::logout();
        return Redirect::route('sessions.create'); // form
    }

}
