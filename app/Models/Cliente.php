<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Cliente
 * @package App\Models
 * @version July 9, 2020, 10:04 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $promesas
 * @property string $Cliente
 * @property string $Tipo
 */
class Cliente extends Model
{

    public $table = 'Clientes';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'Cliente',
        'Tipo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Cliente' => 'string',
        'Tipo' => 'string'
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
    public function promesas()
    {
        return $this->hasMany(\App\Models\Promesa::class, 'id_cliente');
    }
}
