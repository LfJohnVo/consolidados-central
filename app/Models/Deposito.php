<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Deposito
 * @package App\Models
 * @version January 28, 2021, 10:53 am UTC
 *
 * @property \App\Models\Gerente $idGerente
 * @property \App\Models\Proyecto $idProyecto
 * @property \App\Models\CatBanco $idBancos
 * @property string|\Carbon\Carbon $fecha_deposito
 * @property string $tipo_traslado
 * @property number $ingreso_dep_central
 * @property number $ingreso_dep_cliente
 * @property string|\Carbon\Carbon $fecha_venta
 * @property string $folios_traslado
 * @property integer $id_proyecto
 * @property integer $id_gerente
 * @property integer $id_bancos
 * @property string $archivo_pago
 */
class Deposito extends Model
{

    public $table = 'depositos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $connection = "mysql2";

    public $fillable = [
        'fecha_deposito',
        'tipo_traslado',
        'ingreso_dep_central',
        'ingreso_dep_cliente',
        'fecha_venta',
        'folios_traslado',
        'id_proyecto',
        'id_gerente',
        'id_bancos',
        'archivo_pago',
        'comentario'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha_deposito' => 'datetime',
        'tipo_traslado' => 'string',
        'ingreso_dep_central' => 'decimal:0',
        'ingreso_dep_cliente' => 'decimal:0',
        'fecha_venta' => 'datetime',
        'folios_traslado' => 'string',
        'id_proyecto' => 'integer',
        'id_gerente' => 'integer',
        'id_bancos' => 'integer',
        'archivo_pago' => 'string',
        'comentario' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha_deposito' => 'nullable',
        'tipo_traslado' => 'nullable|string|max:50',
        'ingreso_dep_central' => 'nullable|numeric',
        'ingreso_dep_cliente' => 'nullable|numeric',
        'fecha_venta' => 'nullable',
        'folios_traslado' => 'nullable|string|max:255',
        'id_proyecto' => 'nullable',
        'id_gerente' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_bancos' => 'nullable|integer',
        'archivo_pago' => 'nullable|string',
        'comentario' => 'nullable|string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idGerente()
    {
        return $this->belongsTo(\App\Models\Gerente::class, 'id_gerente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idProyecto()
    {
        return $this->belongsTo(\App\Models\Proyecto::class, 'id_proyecto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idBancos()
    {
        return $this->belongsTo(\App\Models\CatBanco::class, 'id_bancos');
    }
}
