<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vars extends Model
{
   /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'app_vars';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'value'
    ];
	
}
