<?php

namespace App\Repositories;

use App\Models\Gerente;
use App\Repositories\BaseRepository;

/**
 * Class GerenteRepository
 * @package App\Repositories
 * @version June 10, 2020, 8:37 pm UTC
*/

class GerenteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_proyecto',
        'nombre',
        'email',
        'password'
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
