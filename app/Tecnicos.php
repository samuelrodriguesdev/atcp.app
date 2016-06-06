<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnicos extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tecnicos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'organismo_entidade_id',
    ];

    /**
	 * vai buscar os contatos dos tecnicos
	 */
    public function contatos()
    {
    	return $this->hasMany('App\TecnicosContatos', 'tecnico_id', 'id');
    }

    /**
     * vai buscar as entidades pertencentes
     */
    public function organismo_entidade()
    {
    	return $this->belongsTo('App\OrganismosEntidades');
    }

    public function projectos()
    {
        return $this->belongsToMany('App\Projectos', 'projecto_tecnicos');
    }
} 
