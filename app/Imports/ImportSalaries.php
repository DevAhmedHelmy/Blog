<?php

namespace App\Imports;

use App\Salary;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportSalaries implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Salary([
            //
        ]);
    }
}
