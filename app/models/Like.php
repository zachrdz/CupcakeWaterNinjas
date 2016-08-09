<?php


class Like extends Eloquent{


  	/**
  	 * The database table used by the model.
  	 *
  	 * @var string
  	 */
  	protected $table = 'likes';

    protected $fillable = [
        'user_liking_id','user_liked_id','recipe_id'];


}
