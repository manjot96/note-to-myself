<?php

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

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function index() {
		return View::make('login');
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
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        echo "hello";
		if(Auth::attempt(Input::only('emailaddress', 'password'))) {
            echo "hello";
            return "Logged in as " . Auth::user()->emailaddress;
        } else {
            echo "goodbye";
            return Redirect::back()->withInput();
        }
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
	public function destroy($id)
	{
		//
	}


}
