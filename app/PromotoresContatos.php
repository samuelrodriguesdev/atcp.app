<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class PromotoresContatos extends Model
{
      /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'promotores_contatos';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'value', 'promotor_id'
    ];
    /**
     * vai buscar a o dono dos contatos
     */
    public function contatos()
    {
    	return $this->belongsTo('app\Promotores', 'id', 'promotor_id');
    }
}
