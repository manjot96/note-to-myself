<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
    
    use UserTrait, RemindableTrait;
    
    public $timestamps = false;
    protected $fillable = ['emailaddress', 'password', 'password_confirmation', 'verification', 'active'];
    
    public $messages;
    /*
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
    
    public static $rules = [
                          'emailaddress'=>'required|email|unique:users',
                          'password'=>'required|min:6|max:30|confirmed',
                          ];
    
    public function isValid() {
		$v = Validator::make($this->attributes, static::$rules);

		if($v->passes())
		{
			return true;
		}

		$this->messages = $v->messages(); // let's create this
		return false;
	}

}
