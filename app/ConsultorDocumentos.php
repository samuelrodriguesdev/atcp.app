<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultorDocumentos extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'consultores_documentos';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
}
