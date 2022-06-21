<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class OperacionDet
 * @package App\Models
 * @version June 18, 2020, 8:00 am UTC
 *
 * @property \App\Models\Proyecto $idProyecto
 * @property string|\Carbon\Carbon $fecha
 * @property integer $no_operaciones
 * @property integer $id_proyecto
 * @property string $estatus
 * @property integer $id_concepto
 */
class OperacionDet extends Model
{

    public $table = 'OperacionesDet';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'fecha',
        'no_operaciones',
        'id_proyecto',
        'estatus',
        'tickets',
        'id_concepto',
        'iva',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha' => 'datetime',
        'no_operaciones' => 'integer',
        'id_proyecto' => 'integer',
        'estatus' => 'string',
        'iva' => 'double',
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
    public function idProyecto()
    {
        return $this->belongsTo(\App\Models\Proyecto::class, 'id_proyecto');
    }
}
