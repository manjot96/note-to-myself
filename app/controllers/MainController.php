<?php
session_start();
class MainController extends \BaseController {
    
    public function index() {
        if (isset($_SESSION["email"])) {
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
		if(!isset($_SESSION["email"])) {
            return "Are you lost? Click <a href='/home'>here</a> to login.";
        } else {
            return View::make('home');
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
		if(!isset($_SESSION["email"])) {
            return "Are you lost? Click <a href='/home'>here</a> to login.";
        } else {
            return View::make('home');
        }
	}

    //handles the request sent by login
    public function store()
	{   
		// only pass the email address and the password; nothing else
		if(Auth::attempt(Input::only('emailaddress', 'password'))) {
            if(isset($_SESSION['count'])) {
                unset($_SESSION['count']);
                unset($_SESSION['countE']);
            }
            $url = '/verify/'.Auth::user()->verification.'/'.Auth::user()->emailaddress;
            
            if(Auth::user()->active == 0) {
                return "Your account is currently locked.
                        <br>Please check your email for activation link or <a href=\"/forgot\">reset</a> your password.<br>
                        Alternatively click <a href='".$url."'>here</a> to activate your account<Br>
                        <a href=\"/login\">Login</a> now.";
            }
            
            
            $_SESSION["email"] = Auth::user()->emailaddress;
            $_SESSION["_ID"] = Auth::user()->_ID;
            
            $res = Note::select('note')->where('_ID', $_SESSION["_ID"])->get()->toArray();
            $_SESSION["notes"] = (!empty($res)) ? $res[0]["note"] : "";
            
            $res = TBD::select('text')->where('_ID', $_SESSION["_ID"])->get()->toArray();
            $_SESSION["tbd"] = (!empty($res)) ? $res[0]["text"] : "";
            
            $res = Website::select('urls')->where('_ID', $_SESSION["_ID"])->get()->toArray();
            $_SESSION["urls"] = array();
            foreach($res as $url) {
                array_push($_SESSION["urls"], $url["urls"]);
            }
            
            $res = Image::select('image')->where('_ID', $_SESSION["_ID"])->get()->toArray();
            $_SESSION["images"] = array();
            foreach($res as $image) {
                array_push($_SESSION["images"], $image["image"]);
            }
            
			return View::make('home');
		} else{
			if (User::where('emailaddress', '=', Input::get('emailaddress'))->exists()){
				$email = Input::only('emailaddress')['emailaddress'];
				$_SESSION['count'] = (isset($_SESSION['countE']) && $_SESSION['countE'] == $email) 
										? ($_SESSION['count'] + 1) : 1;
				$_SESSION['countE'] = $email;
				if($_SESSION['count'] > 3) {
						$pass = str_random(6);
                        $verify = User::select('verification')->where('emailaddress', $email)->first();
                        
						$url  = '/verify/'.$verify['verification'].'/'.$_SESSION['countE'];
						
						DB::table('users')
						->where('emailaddress', $email)
						->update(array('password' => Hash::make($pass), 'active' => 0));
						
						$title = 'Your account has been Locked'; 
						
						Mail::send('emails.emailReset', array('title' => $title, 'pass' => $pass, 'url' => $url), function($message) {
							$message->to($_SESSION['countE'], '')->subject('Account has been locked - Note to Myself!');
						});
						
						unset($_SESSION['count']);
						unset($_SESSION['countE']);
						
						return "Your account has been locked! Check your email for the authentication email and your new password.";
				}
			}
			return View::make('processlogin');
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
	public function update()
	{
        
        $res = Image::select('imgid')->where('_ID', $_SESSION["_ID"])->get()->toArray();
        if(count($res) >= 4) {
            return "Only aloud to upload 4 pictures. Click <a href='/home'>here</a> to go back.";
        } 
        
        $array = array();
        foreach($res as $img) {
             array_push($array, $img['imgid']);
        }
        
        $i = 0;
        foreach($_SESSION["images"] as $img) {
            if(isset($_POST[$i])) {
                DB::delete('delete from Images where imgid="'.$array[$i].'"');
            }
            ++$i;
        }
        
        //uploads here;
        if($_FILES['image']['error'] === UPLOAD_ERR_OK){
            if($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/jpg"
                || $_FILES['image']['type'] == "image/gif" ) {
                $image = file_get_contents($_FILES['image']['tmp_name']);
                Image::insert(array('_id' => $_SESSION["_ID"],
                'image' => $image));
            } else {
                return "Only aloud to upload jpg/gif images. Click <a href='/home'>here</a> to go back.";
            }
        }
        $res = Image::select('image')->where('_ID', $_SESSION["_ID"])->get()->toArray();
        $_SESSION["images"] = array();
        foreach($res as $image) {
            array_push($_SESSION["images"], $image["image"]);
        }
        
        Note::where('_ID', $_SESSION["_ID"])
        ->update(array('note' => $_POST["notes"]));
        $_SESSION["notes"] = $_POST["notes"];
        
        TBD::where('_ID', $_SESSION["_ID"])
        ->update(array('text' => $_POST["tbd"]));
        $_SESSION["tbd"] = $_POST["tbd"];
        
        //Deleting all the websites from our database first so we can repopulate it afterwards;
        DB::delete('delete from Websites where _ID="'.$_SESSION["_ID"].'"');
        
        $_SESSION["urls"] = array();
        foreach($_POST["websites"] as $url) {
            if(!empty($url)) {
                array_push($_SESSION["urls"], $url);
                Website::insert(array('_id' => $_SESSION["_ID"],
                'urls' => $url));
            }
        }
        
        return View::make('home');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function logout()
	{
		if (isset($_SESSION["email"])) {
            //grab more code for session_destroy from php
            session_destroy();
        } return View::make('logout');
		
	}


}
