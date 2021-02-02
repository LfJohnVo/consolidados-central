<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Banco
 * @package App\Models
 * @version February 2, 2021, 10:21 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $depositos
 * @property string $nombre
 * @property string $estatus
 * @property string|\Carbon\Carbon $update_at
 */
class Banco extends Model
{

    public $table = 'cat_bancos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $connection = "mysql2";

    public $fillable = [
        'nombre',
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
        'nombre' => 'string',
        'estatus' => 'string',
        'update_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:50',
        'estatus' => 'nullable|string|max:8',
        'created_at' => 'nullable',
        'update_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function depositos()
    {
        return $this->hasMany(\App\Models\Deposito::class, 'id_bancos');
    }
}
