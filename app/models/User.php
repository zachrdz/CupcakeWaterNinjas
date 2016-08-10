<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	     * The attributes that are mass assignable.
	     *
	     * @var array
	     */
	    protected $fillable = [
	        'name', 'email', 'password', 'profile_pic' , 'recipes_followed', 'profile_type', 'g_auth_token', 'status'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password','g_auth_token');

}
