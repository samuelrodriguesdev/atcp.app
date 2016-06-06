<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramasApoiosDocumentos extends Model
{
   /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'programas_apoios_documentos';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'designacao', 'programa_id', 'apoio_tipo'
    ];
	
	/**
	 * documentos
	 */
    public function documentos() 
    {
    	return $this->belongsTo('App\Programas', 'id', 'programa_id');
    }

    public function projecto_documentos()
    {
        return $this->belongsToMany('App\Projectos', 'projecto_documentos');
    }
}
