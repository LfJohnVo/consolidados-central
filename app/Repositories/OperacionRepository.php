<?php

namespace App\Repositories;

use App\Models\Operacion;
use App\Repositories\BaseRepository;

/**
 * Class OperacionRepository
 * @package App\Repositories
 * @version June 10, 2020, 8:39 pm UTC
*/

class OperacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_proyecto',
        'dia',
        'mes',
        'no_operaciones',
        'ano'
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
        return Operacion::class;
    }
}
