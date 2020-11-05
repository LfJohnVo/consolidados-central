<?php

namespace App\Repositories;

use App\Models\Gerente;
use App\Repositories\BaseRepository;

/**
 * Class GerenteRepository
 * @package App\Repositories
 * @version November 5, 2020, 6:46 pm UTC
*/

class GerenteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'email',
        'password',
        'id_distrital',
        'estatus'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Gerente::class;
    }
}
