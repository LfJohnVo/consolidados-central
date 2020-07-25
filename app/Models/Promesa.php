<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Promesa
 * @package App\Models
 * @version July 9, 2020, 10:04 pm UTC
 *
 * @property \App\Models\Cliente $idCliente
 * @property number $promesa
 * @property number $pagado
 * @property integer $id_cliente
 * @property string $compromete_central
 * @property string $Compromete_cliente
 * @property string $Fecha_promesa
 * @property string $Fecha_pago
 */
class Promesa extends Model
{

    public $table = 'Promesas';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'promesa',
        'pagado',
        'id_cliente',
        'compromete_central',
        'Compromete_cliente',
        'Fecha_promesa',
        'Fecha_pago'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'promesa' => 'decimal:0',
        'pagado' => 'decimal:0',
        'id_cliente' => 'integer',
        'compromete_central' => 'string',
        'Compromete_cliente' => 'string',
        'Fecha_promesa' => 'date',
        'Fecha_pago' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idCliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class, 'id_cliente');
    }
}
