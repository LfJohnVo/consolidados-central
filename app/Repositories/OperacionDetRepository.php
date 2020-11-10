<?php

namespace App\Repositories;

use App\Models\OperacionDet;
use App\Repositories\BaseRepository;

/**
 * Class OperacionDetRepository
 * @package App\Repositories
 * @version June 18, 2020, 8:00 am UTC
*/

class OperacionDetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha',
        'no_operaciones',
        'id_proyecto',
        'estatus',
        'id_concepto'
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
        return OperacionDet::class;
    }
}
