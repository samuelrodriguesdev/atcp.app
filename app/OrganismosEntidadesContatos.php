<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganismosEntidadesContatos extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'organismo_entidades_contatos';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'value', 'organismo_entidade_id'
    ];
    /**
     * vai buscar a o dono dos contatos
     */
    public function contatos()
    {
    	return $this->belongsTo('app\OrganismosEntidades', 'id', 'organismo_entidade_id');
    }
}
