<?php

namespace App\Repositories;

use App\Models\Grupo;
use App\Repositories\BaseRepository;

/**
 * Class GrupoRepository
 * @package App\Repositories
 * @version June 18, 2020, 8:27 am UTC
*/

class GrupoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'grupo'
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
        return Grupo::class;
    }
}
