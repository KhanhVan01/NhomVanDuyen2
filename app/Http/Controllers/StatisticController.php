<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Grade;
use App\Models\Major;
use App\Models\Student;
use App\Models\Subject;
use App\Exports\Statistic;
use App\Models\MarkAverage;
use Illuminate\Http\Request;
use App\Exports\StatistiMultiple;
use Illuminate\Support\Facades\DB;
use App\Exports\StudentResitExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;

class StatisticController extends Controller
{
    //diem theo lop
    public function indexStudent(Request $request)
    {
        $grade = $request->get('grade');
        $listGrade = Grade::join("course", "grade.courseCode", "=", "course.courseCode")
            ->get();
        $listSubject = Subject::all();
        switch ($grade) {
            case 'All':
            case '':
                $listMark = Student::join("grade", "student.classCode", "=", "grade.classCode")
                    // ->where("grade.classCode", "DESC")
                    ->get();
                $j = 0;
                $count = 0;
                $TBT = 0;
                $array = [];
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
                break;
            default:
                $listMark = Student::join("grade", "student.classCode", "=", "grade.classCode")
                    ->where("grade.classCode", $grade)
                    ->get();
                $j = 0;
                $count = 0;
                $TBT = 0;
                $array = [];
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
                break;
        }

        return view('statistic.list-mark-grade', [
            'listSubject' => $listSubject,
            'listGrade' => $listGrade,
            'listMark' => $array,
            'grade' => $grade,
        ]);
    }

    //diem cao nhat
    public function markMax(Request $request)
    {
        $listMajor = Major::all();
        $major = $request->get('major');
        $listMaxMark = Grade::join("course", "grade.courseCode", "=", "course.courseCode")
            ->join("major", "grade.majorCode", "=", "major.majorCode")
            // ->join("student","grade.classCode","=","student.classCode")
            // ->join("mark_average","grade.classCode","=","mark_average.classCode")
            // ->where("grade.majorCode",$major)
            ->get();
        // dd($listMaxMark);
        $j = 0;
        $array = [];
        foreach ($listMaxMark as $value) {
            $idClass = $value->classCode;
            $mark = MarkAverage::where("classCode", "=", $idClass)
                ->max("mark_average");
            $student = Student::where("classCode", "=", $idClass)->get();

            foreach ($student as $value1) {
                $idStudent = $value1->studentCode;
                $mark1 = MarkAverage::where("studentCode", "=", $idStudent)
                ->max("mark_average");
            }
            $list = [
                'id' => $value1->studentCode ,
                'Major' => $value->nameMajor,
                'Grade' => $value->FullGrade,
                'Student' => $value1->FullName,
                'TBT' => $mark,
            ];
            $array[$j++] = $list;
        }
        return view('statistic.list-mark-max', [
            'listMaxMark' => $array,
            'listMajor' => $listMajor,
            'major' => $major,
        ]);
    }

    //danh sach sv thi lai
    public function listStudentResit(Request $request)
    {
        //SELECT * FROM `mark` WHERE (mark_final< 5 AND mark_skill IS NULL)
        //OR (mark_final< 5 AND mark_skill>5) OR ((mark_final> 5 AND mark_skill =0))
        //OR (mark_skill) BETWEEN 0 and 5 OR mark_final IS NULL
        $mark1 = Student::join("mark", "mark.studentCode", "=", "student.studentCode")
            ->join("grade", "student.classCode", "=", "grade.classCode")
            ->join("course", "grade.courseCode", "=", "course.courseCode")
            ->join("subject", "mark.subjectCode", "=", "subject.subjectCode")
            // ->join("mark", "mark.markCode", "=", "mark.markCode")
            ->where("mark_final", "<", 5)
            ->whereNull("mark_skill")
            ->orWhere("mark_skill", "<", 5)
            ->whereNull("mark_final")
            ->orWhere("mark_final", "<", 5)
            ->where("mark_skill", ">", 5)
            ->orWhere("mark_final", ">", 5)
            ->where("mark_skill", "<", 5)
            ->orWhereNull("mark_final")
            ->whereNull("mark_skill")
            ->get();


        return view('statistic.list-student-resit', [
            'mark1' => $mark1,
        ]);
    }

    public function export(Request $request)
    {
        $request->validate([
            'grade' => 'required'
        ]);

        $grades = $request->grade;

        $export = new StatistiMultiple($grades);
        $fileName = "statistic_mark_grade_" . time() . ".xlsx";

        return $export->download($fileName);
    }

    public function exportStudentResit()
    {
        return Excel::download(new StudentResitExport, "statistic_student_resit_" . time() . ".xlsx");
    }
}
