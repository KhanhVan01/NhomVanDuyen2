<?php

namespace App\Exports;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;


class StudentResitExport implements FromView,WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $mark1 = Student::join("mark", "mark.studentCode", "=", "student.studentCode")
        ->join("grade", "student.classCode", "=", "grade.classCode")
        ->join("course", "grade.courseCode", "=", "course.courseCode")
        ->join("subject", "mark.subjectCode", "=", "subject.subjectCode")
        ->where("mark_final", "<", 5)
        ->whereNull("mark_skill")
        ->orWhere("mark_skill", "<", 5)
        ->whereNull("mark_final")
        ->orWhere("mark_final", "<", 5)
        ->where("mark_skill",">",5)
        ->orWhere( "mark_final", ">", 5)
        ->where("mark_skill","<",5)
        ->orWhereNull("mark_final")
        ->whereNull("mark_skill")
        ->get();


    return view('statistic.export1', [
        'mark1' => $mark1,
    ]);
    }

    public function title(): string
    {
        return 'List';
    }
}
