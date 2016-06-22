<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class ProjectoConsultor extends Model
{
   /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'projecto_consultores';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'projecto_id', 'consultor_id', 'contrato_tipo', 'consultoria', 'valor_hora_consultoria', 'numero_horas_consultoria', 'total_consultoria', 'formacao', 'valor_hora_formacao', 'numero_horas_formacao', 'total_formacao', 'data_inicio_servico', 'data_fim_servico', 'elaboracao_canditatura', 'percentagem_elaboracao_candidatura', 'total_elaboracao_candidatura'
    ];

    /**
     * [consultor description]
     * @return [type] [description]
     */
    public function consultor() 
    {
    	return $this->belongsTo('App\Consultores', 'consultor_id', 'id');
    }

    /**
     * [projectos description]
     * @return [type] [description]
     */
    public function projectos() 
    {
    	return $this->belongsTo('App\projectos', 'projecto_id', 'id');
    }

    /**
     * [setDataInicioServicoAttribute description]
     * @param [type] $value [description]
     */
    public function setDataInicioServicoAttribute($value)
    {
        if($value != '')
        {
        $this->attributes['data_inicio_servico'] = Carbon::createFromFormat('d-m-Y', $value)->toDateString();
        }
        
    }
    public function getDataInicioServicoAttribute($value)
    {
        if($value != '')
        {
            return Carbon::parse($value)->format('d-m-Y');
        }
    }

    /**
     * [setDataFimServicoAttribute description]
     * @param [type] $value [description]
     */
    public function setDataFimServicoAttribute($value)
    {
        if($value != '')
        {
        $this->attributes['data_fim_servico'] = Carbon::createFromFormat('d-m-Y', $value)->toDateString();  
        }
        
    }
    public function getDataFimServicoAttribute($value)
    {
        if($value != '')
        {
            return Carbon::parse($value)->format('d-m-Y');
        }
    }
}
