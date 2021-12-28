<?php

namespace App\Exports;

use App\Models\Grade;
use App\Models\Student;
use App\Exports\Statistic;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class StatistiMultiple implements WithMultipleSheets
{
    use Exportable;

    protected $grades;

    public function __construct($grades)
    {
        $this->grades = $grades;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function sheets(): array
    {
        $sheets = [];

        $grades = [];

        if ($this->grades[0] === null) {
            $grades = Grade::all()->map(function($item) {
                return $item->classCode;
            })->toArray();
        } else {
            $grades = $this->grades;
        }
        
        // dd($months);
        foreach ($grades as $grade) {
            $sheets[] = new Statistic($grade);
        }

        return $sheets;
    }
}
