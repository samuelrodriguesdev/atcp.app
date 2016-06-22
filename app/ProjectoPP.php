<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class ProjectoPP extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'projecto_pedidos_pagamento';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'projecto_id', 'valor_pedido_pagamento', 'valor_pago_pagamento', 'data_pedido_pagamento', 'data_recebimento_pagamento', 'estado_pedido_pagamento', 'observacoes'
    ];

    /**
     * [projecto description]
     * @return [type] [description]
     */
    public function projecto() 
    {
    	return $this->belongsTo('App\Projectos', 'projecto_id', 'id');
    }

     /**
     * [setDataInicioServicoAttribute description]
     * @param [type] $value [description]
     */
    public function setDataPedidoPagamentoAttribute($value)
    {
        if($value != '')
        {
        $this->attributes['data_pedido_pagamento'] = Carbon::createFromFormat('d-m-Y', $value)->toDateString();
        }
    }
    public function getDataPedidoPagamentoAttribute($value)
    {
        if($value != '')
        {
            return Carbon::parse($value)->format('d-m-Y');
        }
    }

      /**
     * [setDataInicioServicoAttribute description]
     * @param [type] $value [description]
     */
    public function setDataRecebimentoPagamentoAttribute($value)
    {
        if($value != '')
        {
        $this->attributes['data_recebimento_pagamento'] = Carbon::createFromFormat('d-m-Y', $value)->toDateString();
        }
    }
    public function getDataRecebimentoPagamentoAttribute($value)
    {
        if($value != '')
        {
            return Carbon::parse($value)->format('d-m-Y');
        }
    }
}
