<?php

namespace App\Repositories;

use App\Models\TipoTraslado;
use App\Repositories\BaseRepository;

/**
 * Class TipoTrasladoRepository
 * @package App\Repositories
 * @version February 2, 2021, 10:10 am UTC
*/

class TipoTrasladoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tipo',
        'estatus',
        'update_at'
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
        return TipoTraslado::class;
    }
}
