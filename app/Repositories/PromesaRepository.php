<?php

namespace App\Repositories;

use App\Models\Promesa;
use App\Repositories\BaseRepository;

/**
 * Class PromesaRepository
 * @package App\Repositories
 * @version July 9, 2020, 10:04 pm UTC
*/

class PromesaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'promesa',
        'pagado',
        'id_cliente',
        'compromete_central',
        'Compromete_cliente',
        'Fecha_promesa',
        'Fecha_pago'
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
        return Promesa::class;
    }
}
