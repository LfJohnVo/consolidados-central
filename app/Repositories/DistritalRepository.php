<?php

namespace App\Repositories;

use App\Models\Distrital;
use App\Repositories\BaseRepository;

/**
 * Class DistritalRepository
 * @package App\Repositories
 * @version November 5, 2020, 6:47 pm UTC
*/

class DistritalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'clave_distrito',
        'id_regional',
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
        return Distrital::class;
    }
}
