<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganismosEntidades extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'organismos_entidades';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'morada', 'cp4', 'cp3', 'distrito_id', 'localidade', 
    ];
	
	/**
	 * contatos pertencentes aos OrganismosEntidades
	 */
    public function contatos() 
    {
    	return $this->hasMany('App\OrganismosEntidadesContatos', 'organismo_entidade_id', 'id');
    }

    public function distrito() 
    {
    	return $this->belongsTo('App\Distritos');
    }

    public function organismo_entidade() 
    {
        return $this->hasMany('App\Tecnicos');
    }

    public function centro_emprego() 
    {
        return $this->hasMany('App\Projectos', 'centro_emprego_id', 'id');
    }
}
