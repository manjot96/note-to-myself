<?php
class UsersController extends \BaseController
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
            return View::make("users/index", ['users' => $this->user->all()]);
    }

    public function create()
    {
        return View::make('users.create');
    }

    public function store()
    {
        $input = Input::all();

        $this->user->fill($input);
           
        if(!($this->user->isValid()))
        {
            return Redirect::back()->withInput()->withErrors($this->user->messages);
        }
		$this->user->emailaddress = Input::get('emailaddress');
        $this->user->password     = Hash::make(Input::get('password'));
        $this->user->save();

        return Redirect::route('main.store');
    }
    public function show($id)
    {
        return View::make('users.show',
            ['u'=>$this->user->whereId($id)->first()]);
    }
	
	public function forgot(){
		return View::make('resetpassword');
	}
    
    public function send() {
        $email = Input::get('email');;
        //if the user didn't enter an email;
        if($email == "")
                return "not today";
        
        //If the user doesn't exsist in the database;
        if(User::select('_ID')->where('emailaddress', $email)->first() == null)
            return "not today";
            
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
        //return a view that shows email has been sent or someting;
    }
}