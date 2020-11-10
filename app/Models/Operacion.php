<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Operacion
 * @package App\Models
 * @version June 10, 2020, 8:39 pm UTC
 *
 * @property \App\Models\Proyecto $idProyecto
 * @property integer $id_proyecto
 * @property integer $dia
 * @property integer $no_operaciones
 * @property integer $ano
 */
class Operacion extends Model
{
    use SoftDeletes;

    public $table = 'operaciones';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_proyecto',
        'dia',
        'mes',
        'no_operaciones',
        'ano'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_proyecto' => 'integer',
        'dia' => 'integer',
        'mes' => 'integer',
        'no_operaciones' => 'integer',
        'ano' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_proyecto' => 'required',
        'dia' => 'required',
        'mes' => 'required',
        'no_operaciones' => 'required',
        'ano' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idProyecto()
    {
        return $this->belongsTo(\App\Models\Proyecto::class, 'id_proyecto');
    }
}
