<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultores extends Model
{
   
    use SoftDeletes;
   /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'consultores';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'morada', 'cp4', 'cp3', 'localidade', 'cc', 'cc_validade', 'nif', 'nib', 'hab_literarias', 'regime_iva', 'retencao_na_fonte','certificacao', 'estado_colaboracao', 'observacoes'
    ];

    /**
	 * contatos pertencentes aos OrganismosEntidades
	 */
    public function contatos() 
    {
    	return $this->hasMany('App\ConsultoresContatos', 'consultor_id', 'id');
    }

    public function projectos() 
    {
        return $this->hasMany('App\ProjectoConsultores', 'consultor_id', 'id');
    }

    public function angariadores() 
    {
        return $this->hasMany('App\Projectos', 'angariador_id', 'id');
    }

    public function setCcValidadeAttribute($value)
    {
        $this->attributes['cc_validade'] = Carbon::createFromFormat('m-d-Y', $value)->toDateString();
    }

    public function getCcValidadeAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    
}
