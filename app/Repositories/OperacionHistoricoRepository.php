<?php

namespace App\Repositories;

use App\Models\OperacionHistorico;
use App\Repositories\BaseRepository;

/**
 * Class OperacionHistoricoRepository
 * @package App\Repositories
 * @version June 18, 2020, 8:01 am UTC
*/

class OperacionHistoricoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha',
        'id_proyecto',
        'id_catalogo',
        'estatus',
        'no_operaciones',
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
        return OperacionHistorico::class;
    }
}
