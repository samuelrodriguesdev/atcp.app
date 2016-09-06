<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectoConsultoresDetalhes extends Model
{
    use SoftDeletes;
   /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'projecto_consultores_detalhes';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'projecto_consultor_id', 'trimestre', 'ano', 'tipo', 'valor_hora', 'numero_horas', 'total', 
    ];

    /**
     * [detalhes description]
     * @return [type] [description]
     */
    public function detalhes() 
    {
    	return $this->belongsTo('App\ProjectoConsultor', 'projecto_consultor_id', 'id');
    }
}
