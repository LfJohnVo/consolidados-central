<?php

namespace App\Repositories;

use App\Models\Proyecto;
use App\Repositories\BaseRepository;

/**
 * Class ProyectoRepository
 * @package App\Repositories
 * @version June 18, 2020, 7:56 am UTC
*/

class ProyectoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'no_proyecto',
        'Nombre',
        'id_region',
        'id_grupo'
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
        return Proyecto::class;
    }
}
