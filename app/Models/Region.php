<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Region
 * @package App\Models
 * @version June 18, 2020, 7:55 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $proyectos
 * @property string $nombre
 * @property string $identificador
 */
class Region extends Model
{

    public $table = 'regiones';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'nombre',
        'identificador'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'identificador' => 'string'
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
    public function proyectos()
    {
        return $this->hasMany(\App\Models\Proyecto::class, 'id_region');
    }
}
