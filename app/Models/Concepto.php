<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Concepto
 * @package App\Models
 * @version June 18, 2020, 7:48 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $operacionesDetHistoricos
 * @property string $descripcion
 * @property string $tipo
 * @property integer $id_mat_articulo
 * @property string $estatus
 */
class Concepto extends Model
{

    public $table = 'cat_conceptos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'descripcion',
        'tipo',
        'id_mat_articulo',
        'estatus'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_catalogo' => 'integer',
        'descripcion' => 'string',
        'tipo' => 'string',
        'id_mat_articulo' => 'integer',
        'estatus' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function operacionesDetHistoricos()
    {
        return $this->hasMany(\App\Models\OperacionesDetHistorico::class, 'id_concepto');
    }
}
