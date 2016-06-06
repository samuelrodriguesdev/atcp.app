<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Promotores extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'promotores';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'morada', 'cp4', 'cp3', 'localidade', 'cc', 'cc_validade', 'data_nascimento', 'nif', 'nib', 'hab_literarias', 'promotor_estado'
    ];

    /**
	 * contatos
	 */
    public function contatos() 
    {
    	return $this->hasMany('App\PromotoresContatos', 'promotor_id', 'id');
    }

    /**
	 * ficha iniciativa
	 */
    public function ficha_iniciativa() 
    {
    	return $this->hasOne('App\PromotoresFichaIniciativa', 'promotor_id', 'id');
    }

    /**
	 * projectos
	 */
    public function projecto() 
    {
    	return $this->hasOne('App\Projectos', 'promotor_id', 'id');
    }

    public function setCcValidadeAttribute($value)
    {
        $this->attributes['cc_validade'] = Carbon::createFromFormat('m-d-Y', $value)->toDateString();
    }

    public function getCcValidadeAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function setDataNascimentoAttribute($value)
    {
        $this->attributes['data_nascimento'] = Carbon::createFromFormat('m-d-Y', $value)->toDateString();
    }

    public function getDataNascimentoAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
