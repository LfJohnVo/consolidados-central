<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Grupo
 * @package App\Models
 * @version June 18, 2020, 8:27 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $proyectos
 * @property string $grupo
 */
class Grupo extends Model
{

    public $table = 'cat_grupos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'grupo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_grupos' => 'integer',
        'grupo' => 'string'
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
        return $this->hasMany(\App\Models\Proyecto::class, 'id_grupo');
    }
}
