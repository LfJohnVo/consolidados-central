<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Gerente
 * @package App\Models
 * @version November 5, 2020, 6:46 pm UTC
 *
 * @property \App\Models\Distritale $idDistrital
 * @property \Illuminate\Database\Eloquent\Collection $proyectos
 * @property string $nombre
 * @property string $email
 * @property string $password
 * @property integer $id_distrital
 * @property string $estatus
 */
class Gerente extends Model
{

    public $table = 'gerentes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'nombre',
        'email',
        'password',
        'id_distrital',
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
        'email' => 'string',
        'password' => 'string',
        'id_distrital' => 'integer',
        'estatus' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'password' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_distrital' => 'nullable|integer',
        'estatus' => 'nullable|string|max:5'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idDistrital()
    {
        return $this->belongsTo(\App\Models\Distritale::class, 'id_distrital');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function proyectos()
    {
        return $this->hasMany(\App\Models\Proyecto::class, 'id_gerentes');
    }
}
