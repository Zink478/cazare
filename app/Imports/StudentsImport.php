<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'IDNP' => $row[0],
            'name' => $row[1],
            'surname' => $row[2],
            'phone' => $row[3],
            'group' => $row[4]
        ]);

    }
}
