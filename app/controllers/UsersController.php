<?php
use ReCaptcha\ReCaptcha;
class UsersController extends \BaseController
{
    protected $user;
	
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
            //return View::make("users/index", ['users' => $this->user->all()]);
    }

    public function create()
    {
        return View::make('users.create');
    }

    //registeration;
    public function store()
    {
		$secret = "6LcwWhoTAAAAANp8NI4eEcCFOFyQPsCvB_lAaT1v";
        $response = Input::get('g-recaptcha-response');
        $remoteip = $_SERVER['REMOTE_ADDR'];

        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($response, $remoteip);
		
        $input  = Input::all();

        $this->user->fill($input);
        
        if(!($this->user->isValid()))
		{ 
            return Redirect::back()->withInput()->withErrors($this->user->messages);
		}
		if(!($resp->isSuccess())){
			return Redirect::back()->withInput();
		}
		$this->user->emailaddress = Input::get('emailaddress');
        $this->user->password     = Hash::make(Input::get('password'));
		unset($this->user->password_confirmation);
        $this->user->save();
        $url = '';
        
        Mail::send('emails.emailRegister', array('email' => $this->user->emailaddress, 'url' => $url), function($message) {
            $message->to($this->user->emailaddress, '')->subject('Welcome to Note to Myself!');
        });

        return View::make('users.postregisteration')->with('email', $this->user->emailaddress);
    }
    public function show($id)
    {
        //
    }
	
	public function forgot(){
		return View::make('resetpassword');
	}
    
    public function send() {
        $email = Input::get('email');;
        //if the user didn't enter an emil
        //If the user doesn't exsist in the database;
        if(User::select('_ID')->where('emailaddress', $email)->first() == null || empty($email)) {
            return View::make('users.resetreminder')->with('email', $email);
        }
            
        $pass = str_random(6);
        
        //ARE WE SUPPOSED TO DO THIS??
        //currently it will change password whenever you enter a valid email address;
        DB::table('users')
            ->where('emailaddress', $email)
            ->update(array('password' => $pass));
        
        return $pass;
        //Send the email; passing in variables pass and email to view 'hello' so access them from there later;
        Mail::send('hello', array('pass' => $pass, 'email' => $email), function($message) {
            $message->to(Input::get('email'), '')->subject('Welcome to the Laravel 4 Auth App!');
        });
        //return a view that shows email has been sent and pass the password in there;
    }
}