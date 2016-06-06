<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distritos extends Model
{
   /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'distritos';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['designacao'];
	
	/**
	 * distritos
	 */
    public function distrito() 
    {
    	return $this->hasMany('App\OrganismosEntidades');
    }
}
