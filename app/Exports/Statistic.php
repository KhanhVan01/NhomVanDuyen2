<?php

namespace App\Exports;

use App\Models\Mark;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class Statistic implements FromView, ShouldAutoSize,WithTitle
{
    use Exportable;
    private $grade;

    public function __construct($grade)
    {
        $this->grade = $grade;
    }

    // public function collection(){
    //     return Student::findOrFail($this->grade);
    // }

    public function view(): View
    {
        // return Grade::findOrFail($this->grade);
        // dd($this->grade);
        $listSubject = Subject::all();
        $listMark = Student::join("grade", "student.classCode", "=", "grade.classCode")
            ->where("grade.classCode", $this->grade)
            ->get();

        $j = 0;
        $count = 0;
        $TBT = 0;
        foreach ($listMark as $value) {
            $idStudent = $value->studentCode;
            $mark = Mark::join("subject", "mark.subjectCode", "=", "subject.subjectCode")
                ->where("studentCode", "=", $idStudent)
                ->get();
            $count =  Mark::join("subject", "mark.subjectCode", "=", "subject.subjectCode")
                ->where("studentCode", "=", $idStudent)
                ->count();
            $TB = 0;
            $k = 0;
            foreach ($mark as $val1) {
                $list1 = [
                    'TT' => $val1->TB,
                ];
                $score1[$k++] = $list1;
            }
            foreach ($mark as $val) {
                $TB = $TB + $val->TB;
            }
            if ($count == 0) {
                $count = 1;
            }
            $TBT = round($TB / $count, 1);
            $list = [
                'id' => $value->studentCode,
                'idGrade' => $value->classCode,
                'class' => $value->FullGrade,
                'Student' => $value->FullName,
                'TBM' => $score1,
                'TBT' => $TBT,
            ];
            $array[$j++] = $list;
            
        }
        return view('statistic.export',[
            'listSubject' => $listSubject,
            'listMark' => $array,
        ]);
    }
    // public function collection()o
    // {
    //    return Student::select('studentCode','email','firstName','middleName','lastName','dateOfBirth','genDer','phone','address')->get();
    //     // return ExcelStudent::all();
    // }
    // public function headings() :array {
    // 	return ["Mã sinh viên", "Email", "Tên", "Tên đệm","Họ","Ngày sinh","Giới tính","Số điện thoại","Địa Chỉ"];
    // }
    public function title(): string
    {
        return 'Grade: ' . Grade::where('classCode', $this->grade)->first()->FullGrade;
    }
}
