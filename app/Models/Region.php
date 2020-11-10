<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Region
 * @package App\Models
 * @version November 5, 2020, 6:49 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $distritales
 * @property string $nombre_regional
 * @property string $clave_region
 * @property string $ESTATUS
 */
class Region extends Model
{

    public $table = 'regionales';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'nombre_regional',
        'clave_region',
        'ESTATUS'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre_regional' => 'string',
        'clave_region' => 'string',
        'ESTATUS' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre_regional' => 'nullable|string|max:150',
        'clave_region' => 'required|string|max:25',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'ESTATUS' => 'nullable|string|max:1'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function distritales()
    {
        return $this->hasMany(\App\Models\Distritale::class, 'id_regional');
    }
}
