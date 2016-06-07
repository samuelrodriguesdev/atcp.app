<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        'projecto_id', 'valor_pedido_pagamento', 'valor_pago_pagamento', 'data_pedido_pagamento', 'estado_pedido_pagamento', 'observacoes'
    ];

    /**
     * [projecto description]
     * @return [type] [description]
     */
    public function projecto() 
    {
    	return $this->belongsTo('App\Projectos', 'projecto_id', 'id');
    }
}
