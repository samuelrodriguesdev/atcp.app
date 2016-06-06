<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programas extends Model
{
   /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'programas';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'designacao', 'apoio_criacao', 'apoio_consolidacao', 'apoio_consolidacao_valor_maximo', 'apoio_criacao_valor_maximo'
    ];
	
	/**
	 * documentos
	 */
    public function documentos() 
    {
    	return $this->hasMany('App\ProgramasApoiosDocumentos', 'programa_id', 'id');
    }

    /**
     * documentos
     */
    public function programa() 
    {
        return $this->hasMany('App\Projectos', 'programa_id', 'id');
    }
}

