<?php

namespace App\Imports;

use App\Models\Student;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
// use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;



class ExcelImportsStudent implements ToModel ,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function transformDate($value, $format = 'Y-m-d')
{
    try {
        return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
    } catch (\ErrorException $e) {
        return \Carbon\Carbon::createFromFormat($format, $value);
    }
}
    public function model(array $row)
    {
        return new Student([
           'studentCode' => $row['ma'],
           'email' => $row['email'], 
           'passWord' => $row['pass'],
           'firstName' =>$row['ten'],
           'middleName'=>$row['dem'],
           'lastName'=>$row['ho'],
           'dateOfBirth'=> $this->transformDate($row['ns']),
           'genDer'=>$row['gt'],
           'phone'=>$row['sd'],
           'address'=>$row['add'],
           'dateEnrollment'=> $this->transformDate($row['st']),
           'classCode'=>$row['class'],
        ]);
    }
      public function headingRow(): int
    {
        return 1;
    }
}
