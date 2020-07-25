<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Proyecto
 * @package App\Models
 * @version June 18, 2020, 7:56 am UTC
 *
 * @property \App\Models\CatGrupo $idGrupo
 * @property \App\Models\Regione $idRegion
 * @property \Illuminate\Database\Eloquent\Collection $operacionesDets
 * @property \Illuminate\Database\Eloquent\Collection $gerentes
 * @property integer $no_proyecto
 * @property string $Nombre
 * @property integer $id_region
 * @property integer $id_grupo
 */
class Proyecto extends Model
{

    public $table = 'proyecto';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'no_proyecto',
        'Nombre',
        'id_region',
        'id_grupo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'no_proyecto' => 'integer',
        'Nombre' => 'string',
        'id_region' => 'integer',
        'id_grupo' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idGrupo()
    {
        return $this->belongsTo(\App\Models\CatGrupo::class, 'id_grupo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idRegion()
    {
        return $this->belongsTo(\App\Models\Regione::class, 'id_region');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function operacionesDets()
    {
        return $this->hasMany(\App\Models\OperacionesDet::class, 'id_proyecto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function gerentes()
    {
        return $this->hasMany(\App\Models\Gerente::class, 'id_proyecto');
    }
}
