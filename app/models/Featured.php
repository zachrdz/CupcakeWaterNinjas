<?php


class Featured extends Eloquent{


  	/**
  	 * The database table used by the model.
  	 *
  	 * @var string
  	 */
  	protected $table = 'featured_recipes';

    protected $fillable = [
        'recipe_id_1','recipe_id_2','recipe_id_3','recipe_id_4','recipe_id_5','recipe_id_6','recipe_id_7','recipe_id_8'];


}
