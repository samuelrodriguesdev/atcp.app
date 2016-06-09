<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Projectos extends Model
{
   /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'projectos';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'promotor_id', 'programa_id', 'angariador_id', 'centro_emprego_id', 'apoio_criacao', 'apoio_criacao_estado', 'apoio_consolidacao', 'apoio_consolidacao_estado', 'apoio_tecnico_estado', 'declaracao_atcp', 'declaracao_atcp_data', 'contrato_atcp', 'contrato_atcp_data', 'projecto_data_inicio', 'projecto_data_submissao', 'projecto_data_aprovacao', 'projecto_data_fim', 'processo_numero', 'inicio_actividade_data', 'numero_meses', 'montante_total_elegivel', 'projecto_notas'
    ];
	
	/**
	 * projectos
	 */
    public function projecto() 
    {
    	return $this->belongsTo('App\Promotores', 'promotor_id', 'id');
    }

     /**
	 * programas
	 */
    public function programa() 
    {
    	return $this->belongsTo('App\Programas', 'programa_id', 'id');
    }

    public function tecnicos()
    {
        return $this->belongsToMany('App\Tecnicos', 'projecto_tecnicos', 'projecto_id', 'tecnico_id');
    }


    public function documentos() 
    {
        return $this->belongsToMany('App\ProgramasApoiosDocumentos', 'projecto_documentos', 'projecto_id', 'documento_id');
    }

        public function contratos()
        {
            return $this->hasMany('App\ProjectoConsultor', 'projecto_id', 'id');
        }

    public function pedidos_pagamento()
    {
        return $this->hasMany('App\ProjectoPP', 'projecto_id', 'id');
    }

    public function angariadores()
    {
        return $this->belongsTo('App\Consultores', 'angariador_id', 'id');
    }

    public function centro_emprego()
    {
        return $this->belongsTo('App\OrganismosEntidades', 'centro_emprego_id', 'id');
    }

    /**
     * [setDeclaracaoAtcpDataAttribute description]
     * @param [type] $value [description]
     */
    public function setDeclaracaoAtcpDataAttribute($value)
    {
        $this->attributes['declaracao_atcp_data'] = Carbon::createFromFormat('d-m-Y', $value)->toDateString();
    }
    public function getDeclaracaoAtcpDataAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
    /**
     * [setContratoAtcpDataAttribute description]
     * @param [type] $value [description]
     */
    public function setContratoAtcpDataAttribute($value)
    {
        $this->attributes['contrato_atcp_data'] = Carbon::createFromFormat('m-d-Y', $value)->toDateString();
    }
    public function getContratoAtcpDataAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
    /**
     * [setProjectoDataInicioAttribute description]
     * @param [type] $value [description]
     */
    public function setProjectoDataInicioAttribute($value)
    {
        $this->attributes['projecto_data_inicio'] = Carbon::createFromFormat('d-m-Y', $value)->toDateString();
    }
    public function getProjectoDataInicioAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
    /**
     * [setProjectoDataInicioAttribute description]
     * @param [type] $value [description]
     */
    public function setProjectoDataSubmissaoAttribute($value)
    {
        $this->attributes['projecto_data_submissao'] = Carbon::createFromFormat('d-m-Y', $value)->toDateString();
    }
    public function getProjectoDataSubmissaoAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
    /**
     * [setProjectoDataAprovacaoAttribute description]
     * @param [type] $value [description]
     */
    public function setProjectoDataAprovacaoAttribute($value)
    {
        $this->attributes['projecto_data_aprovacao'] = Carbon::createFromFormat('d-m-Y', $value)->toDateString();
    }
    public function getProjectoDataAprovacaoAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    /**
     * [setProjectoDataFimAttribute description]
     * @param [type] $value [description]
     */
    public function setProjectoDataFimAttribute($value)
    {
        $this->attributes['projecto_data_fim'] = Carbon::createFromFormat('d-m-Y', $value)->toDateString();
    }
    public function getProjectoDataFimAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

     /**
     * [setInicioActividadeDataAttribute description]
     * @param [type] $value [description]
     */
    public function setInicioActividadeDataAttribute($value)
    {
        $this->attributes['inicio_actividade_data'] = Carbon::createFromFormat('d-m-Y', $value)->toDateString();
    }
    public function getInicioActividadeDataAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
