<?php


class Recipe extends Eloquent{


  	/**
  	 * The database table used by the model.
  	 *
  	 * @var string
  	 */
  	protected $table = 'recipes';

    protected $fillable = [
        'user_id','recipe_name','difficulty','likes','dislikes','views','ingredients','directions','recipe_pic', 'cook_time'];


}
