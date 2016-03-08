<?php
session_start();
class MainController extends \BaseController {
	
	public function index3(){
		DB::table('images')->insert([
		'image' => DB::raw("LOAD_FILE('./hooves.jpg')")
		]);
		return View::make('images/index', ['images'=>Image::all()]);
	}
	
	public function index2(){
		return View::make('users/index', ['users'=>User::all()]);
	}
    
    public function index() {
        if (isset($_SESSION["email"])) {
            //sends us to the home page where all notes are;
            return View::make('home');
        }else{
            return View::make('login');
        }
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}
    
    public function store()
	{
		// only pass the email address and the password; nothing else
		if(Auth::attempt(Input::only('emailaddress', 'password'))) {
            $_SESSION["email"] = Auth::user()->emailaddress;
            $res = User::select('_ID')->where('emailaddress', $_SESSION["email"])->first();
            //check if $res is empty here
            $_SESSION["_ID"] = $res["_ID"];
            $res = Note::select('note')->where('_ID', $_SESSION["_ID"])->get()->toArray();
            $_SESSION["notes"] = (!empty($res)) ? $res[0]["note"] : "";
            $res = TBD::select('text')->where('_ID', $_SESSION["_ID"])->get()->toArray();
            $_SESSION["tbd"] = (!empty($res)) ? $res[0]["text"] : "";
            $res = Website::select('urls')->where('_ID', $_SESSION["_ID"])->get()->toArray();
            $_SESSION["urls"] = array();
            foreach($res as $url) {
                array_push($_SESSION["urls"], $url["urls"]);
            }
			return View::make('home');
		} else{
			return Redirect::back()->withInput();
        }
    }


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function logout()
	{
		session_destroy();
	}


}
