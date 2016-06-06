<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TecnicosContatos extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tecnicos_contatos';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'value', 'tecnico_id'
    ];

    /**
     * vais buscar os tecnicos donos dos contatos
     */
    public function contatos()
    {
    	return $this->belongsTo('App\Tecnicos', 'tecnico_id');
    }
}
