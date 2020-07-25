<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OperacionesImport implements ToModel, WithHeadingRow

{
    use Importable;
    public function model(array $row)
    {
        return $row;
    }
}

