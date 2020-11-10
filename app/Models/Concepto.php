<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Concepto
 * @package App\Models
 * @version November 3, 2020, 6:08 am UTC
 *
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
        'descripcion' => 'nullable|string|max:250',
        'tipo' => 'nullable|string|max:45',
        'id_mat_articulo' => 'nullable|integer',
        'estatus' => 'nullable|string|max:5'
    ];

    
}
