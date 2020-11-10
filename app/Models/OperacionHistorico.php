<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class OperacionHistorico
 * @package App\Models
 * @version June 18, 2020, 8:01 am UTC
 *
 * @property \App\Models\CatConcepto $idConcepto
 * @property string|\Carbon\Carbon $fecha
 * @property integer $id_proyecto
 * @property integer $id_catalogo
 * @property string $estatus
 * @property integer $no_operaciones
 * @property integer $id_concepto
 */
class OperacionHistorico extends Model
{

    public $table = 'Operaciones_Det_Historico';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'fecha',
        'id_proyecto',
        'id_catalogo',
        'estatus',
        'no_operaciones',
        'id_concepto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_operaciones_hist' => 'integer',
        'fecha' => 'datetime',
        'id_proyecto' => 'integer',
        'id_catalogo' => 'integer',
        'estatus' => 'string',
        'no_operaciones' => 'integer',
        'id_concepto' => 'integer'
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
    public function idConcepto()
    {
        return $this->belongsTo(\App\Models\CatConcepto::class, 'id_concepto');
    }
}
