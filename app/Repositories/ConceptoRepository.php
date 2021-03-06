<?php

namespace App\Repositories;

use App\Models\Concepto;
use App\Repositories\BaseRepository;

/**
 * Class ConceptoRepository
 * @package App\Repositories
 * @version November 3, 2020, 6:08 am UTC
*/

class ConceptoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'descripcion',
        'tipo',
        'id_mat_articulo',
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
        return Concepto::class;
    }
}
