<?php

namespace App\Exports;

use App\Models\OperacionDet;
use App\Models\OperacionHistorico;
use App\Models\Concepto;
use App\Models\Gerente;
use App\Models\Grupo;
use App\Models\Proyecto;
use App\Models\Region;
use App\User;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;


class UsersExport implements FromQuery
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function query()
    {
        return OperacionDet::query();
    }
}
