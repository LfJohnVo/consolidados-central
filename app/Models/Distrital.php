<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Distrital
 * @package App\Models
 * @version November 5, 2020, 6:47 pm UTC
 *
 * @property \App\Models\Regionale $idRegional
 * @property \Illuminate\Database\Eloquent\Collection $gerentes
 * @property string $nombre
 * @property string $clave_distrito
 * @property integer $id_regional
 * @property boolean $estatus
 */
class Distrital extends Model
{

    public $table = 'distritales';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'nombre',
        'clave_distrito',
        'id_regional',
        'estatus'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'clave_distrito' => 'string',
        'id_regional' => 'integer',
        'estatus' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'nullable|string|max:50',
        'clave_distrito' => 'nullable|string|max:20',
        'id_regional' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'estatus' => 'nullable|boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idRegional()
    {
        return $this->belongsTo(\App\Models\Regionale::class, 'id_regional');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function gerentes()
    {
        return $this->hasMany(\App\Models\Gerente::class, 'id_distrital');
    }
}
