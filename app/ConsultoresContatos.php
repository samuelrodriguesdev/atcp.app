<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultoresContatos extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'consultores_contatos';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'value', 'consultor_id'
    ];
    /**
     * vai buscar a o dono dos contatos
     */
    public function contatos()
    {
    	return $this->belongsTo('app\Consultores', 'id', 'consultor_id');
    }
}
