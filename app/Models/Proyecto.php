<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Proyecto
 * @package App\Models
 * @version November 5, 2020, 6:47 pm UTC
 *
 * @property \App\Models\Gerente $idGerentes
 * @property \App\Models\CatGrupo $idGrupo
 * @property \Illuminate\Database\Eloquent\Collection $operacionesDets
 * @property \Illuminate\Database\Eloquent\Collection $catConceptos
 * @property integer $no_proyecto
 * @property string $Nombre
 * @property integer $id_gerentes
 * @property integer $id_grupo
 * @property string $estatus
 */
class Proyecto extends Model
{

    public $table = 'proyecto';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'no_proyecto',
        'Nombre',
        'id_gerentes',
        'id_grupo',
        'estatus'
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
        'id_gerentes' => 'integer',
        'id_grupo' => 'integer',
        'estatus' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'no_proyecto' => 'required|integer',
        'Nombre' => 'required|string|max:255',
        'id_gerentes' => 'required|integer',
        'id_grupo' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'estatus' => 'nullable|string|max:1'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idGerentes()
    {
        return $this->belongsTo(\App\Models\Gerente::class, 'id_gerentes');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idGrupo()
    {
        return $this->belongsTo(\App\Models\CatGrupo::class, 'id_grupo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function operacionesDets()
    {
        return $this->hasMany(\App\Models\OperacionesDet::class, 'id_proyecto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function catConceptos()
    {
        return $this->belongsToMany(\App\Models\CatConcepto::class, 'Operaciones_Det_Historico');
    }
}
