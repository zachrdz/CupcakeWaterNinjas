<?php


class Comment extends Eloquent{


  	/**
  	 * The database table used by the model.
  	 *
  	 * @var string
  	 */
  	protected $table = 'comments';

    protected $fillable = [
        'user_id','recipe_id','comment'];


}
