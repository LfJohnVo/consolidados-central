<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class TipoTraslado
 * @package App\Models
 * @version February 2, 2021, 10:10 am UTC
 *
 * @property string $tipo
 * @property string $estatus
 * @property string|\Carbon\Carbon $update_at
 */
class TipoTraslado extends Model
{

    public $table = 'cat_depositos_tipo';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $connection = "mysql2";

    public $fillable = [
        'tipo',
        'estatus',
        'update_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tipo' => 'string',
        'estatus' => 'string',
        'update_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tipo' => 'required|string|max:50',
        'estatus' => 'nullable|string|max:8',
        'created_at' => 'nullable',
        'update_at' => 'nullable'
    ];

    
}
