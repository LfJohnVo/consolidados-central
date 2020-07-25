<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Gerente
 * @package App\Models
 * @version June 10, 2020, 8:37 pm UTC
 *
 * @property \App\Models\Proyecto $idProyecto
 * @property integer $id_proyecto
 * @property string $nombre
 * @property string $email
 * @property string $password
 */
class Gerente extends Authenticatable
{
    use Notifiable;
    //use SoftDeletes;

    public $table = 'gerentes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_proyecto',
        'nombre',
        'email',
        'password'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_proyecto' => 'integer',
        'nombre' => 'string',
        'email' => 'string',
        'password' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_proyecto' => 'required',
        'nombre' => 'required',
        'email' => 'required',
        'password' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idProyecto()
    {
        return $this->belongsTo(\App\Models\Proyecto::class, 'id_proyecto');
    }
}
