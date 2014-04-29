<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface{

	public $timestamps = false;
	//protected $fillable = ['email','password'];
	protected $guarded = [];

	

	protected static $rules = ['email'=>'required|unique:users|email',
		 'password' =>'Required|Confirmed',
		'password_confirmation' =>'Required'];



	

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}


}