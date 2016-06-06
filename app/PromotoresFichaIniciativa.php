<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class PromotoresFichaIniciativa extends Model
{
      /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'promotores_ficha_iniciativa';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'promotor_id', 'situacao_profissional', 'tipo_desemprego', 'situacao_profissional_data', 'centro_emprego_inscricao', 'centro_emprego_inscricao_data', 'subsidio_desemprego', 'subsidio_desemprego_valor', 'subsidio_desemprego_data', 'funcoes_desempenhadas', 'negocio_proprio', 'intencao_negocio_proprio', 'fundador', 'apoio_externo' , 'estado_negocio' , 'area_intervencao', 'pontos_fortes', 'objectivos', 'tipo_bem_servico', 'caracterizacao_mercado' , 'caracterizacao_instalacoes' , 'recursos_materiais', 'recursos_tecnologicos', 'recursos_humanos', 'recursos_financeiros', 'elaboracao_candidatura' , 'capital_proprio' , 'micro_invest', 'antecipacao_subsidio', 'caracteristicas_promotor'
    ];
    /**
     * vai buscar a o dono da ficha
     */
    public function ficha_iniciativa()
    {
    	return $this->belongsTo('app\Promotores', 'id', 'promotor_id');
    }

    public function setSituacaoProfissionalDataAttribute($value)
    {
        $this->attributes['situacao_profissional_data'] = Carbon::createFromFormat('m-d-Y', $value)->toDateString();
    }
    public function getSituacaoProfissionalDataAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function setCentroEmpregoInscricaoDataAttribute($value)
    {
        $this->attributes['centro_emprego_inscricao_data'] = Carbon::createFromFormat('m-d-Y', $value)->toDateString();
    }
    public function getCentroEmpregoInscricaoDataAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

  
}
