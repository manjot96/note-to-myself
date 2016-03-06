<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
    public $timestamps = false;
    protected $fillable = ['emailaddress', 'password'];
    use UserTrait, RemindableTrait;
    
    public $messages;
    /*
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
    
    public static $rules = [
                          'emailaddress'=>'required',
                          'password'=>'required|min:6|max:30'
                          ];
    
    public function isValid() {
		//create our validator;pass it the data and the data's rules
		//$v = Validator::make(Input::all(), Student::$rules);
		$v = Validator::make($this->attributes, static::$rules);

		if($v->passes())
		{
			return true;
		}

		$this->messages = $v->messages(); // let's create this
		return false;
	}

}
