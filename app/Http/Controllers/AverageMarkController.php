<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use App\Models\MarkResit;
use App\Models\MarkAverage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AverageMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $grade = $request->get('grade');
        $listGrade = Grade::join("course", "grade.courseCode", "=", "course.courseCode")
            ->get();
        switch ($grade) {
            case 'All':
            case '':
                $listAvgMark = Student::join("grade", "student.classCode", "grade.classCode")
                    ->join("course", "grade.courseCode", "=", "course.courseCode")
                    ->join("major", "grade.majorCode", "=", "major.majorCode")->get();
                $j = 0;
                $count = 0;
                $TBT = 0;
                foreach ($listAvgMark as $value) {
                    $idStudent = $value->studentCode;
                    $mark = Mark::join("subject", "mark.subjectCode", "=", "subject.subjectCode")
                        ->where("studentCode", "=", $idStudent)
                        ->get();
                    $count =  Mark::join("subject", "mark.subjectCode", "=", "subject.subjectCode")
                        ->where("studentCode", "=", $idStudent)
                        ->count();
                    $TB = 0;
                    foreach ($mark as $val) {
                        $TB = $TB + $val->TB;
                    }
                    if ($count == 0) {
                        $count = 1;
                    }
                    $TBT = round($TB / $count, 1);
                    $list = [
                        'major' => $value->majorCode,
                        'id' => $value->studentCode,
                        'id-grade' => $value->classCode,
                        'grade' => $value->FullGrade,
                        'student' => $value->FullName,
                        'TBT' => $TBT,
                    ];
                    $array[$j++] = $list;
                }
                break;
            default:
                $listAvgMark = Student::join("grade", "student.classCode", "grade.classCode")
                    ->where("grade.classCode", $grade)
                    ->get();
                $j = 0;
                $count = 0;
                $TBT = 0;
                foreach ($listAvgMark as $value) {
                    $idStudent = $value->studentCode;
                    $mark = Mark::join("subject", "mark.subjectCode", "=", "subject.subjectCode")
                        ->where("studentCode", "=", $idStudent)
                        ->get();
                    $count =  Mark::join("subject", "mark.subjectCode", "=", "subject.subjectCode")
                        ->where("studentCode", "=", $idStudent)
                        ->count();
                    $TB = 0;
                    foreach ($mark as $val) {
                        $TB = $TB + $val->TB;
                    }
                    if ($count == 0) {
                        $count = 1;
                    }
                    $TBT = round($TB / $count, 1);
                    $list = [
                        'id' => $value->studentCode,
                        'id-grade' => $value->classCode,
                        'grade' => $value->FullGrade,
                        'student' => $value->FullName,
                        'TBT' => $TBT,
                    ];
                    $array[$j++] = $list;
                }
                break;
        }

        return view('average-mark.list-average-mark', [
            'listAvgMark' => $array,
            'listGrade' => $listGrade,
            'grade' => $grade,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $listAvgMark = Student::join("grade", "student.classCode", "grade.classCode")->get();
        $j = 0;
        $count = 0;
        $TBT = 0;
        foreach ($listAvgMark as $value) {
            $idStudent = $value->studentCode;
            $mark = Mark::join("subject", "mark.subjectCode", "=", "subject.subjectCode")
                ->where("studentCode", "=", $idStudent)
                ->get();
            $count =  Mark::join("subject", "mark.subjectCode", "=", "subject.subjectCode")
                ->where("studentCode", "=", $idStudent)
                ->count();
            $TB = 0;
            foreach ($mark as $val) {
                $TB = $TB + $val->TB;
            }
            if ($count == 0) {
                $count = 1;
            }
            $TBT = round($TB / $count, 1);
        }

        return Redirect::route('mark-average.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::join("grade", "student.classCode", "grade.classCode")
            ->join("course", "grade.courseCode", "=", "course.courseCode")
            ->join("major", "grade.majorCode", "=", "major.majorCode")
            ->where("studentCode", "=", $id )
            ->get();
        $mark = Mark::join("subject", "mark.subjectCode", "=", "subject.subjectCode")
            ->where("studentCode", "=",  $id)
            ->get();
        $count =  Mark::join("subject", "mark.subjectCode", "=", "subject.subjectCode")
            ->where("studentCode", "=", $id )
            ->count();
        $TB = 0;
        foreach ($mark as $val) {
            $TB = $TB + $val->TB;
        }
        if ($count == 0) {
            $count = 1;
        }
        $TBT = round($TB / $count, 1);
        return view('average-mark.list-detail-mark', [
            'mark' => $mark,
            'student' => $student,
            'TBT' => $TBT,
        ]);
        // return Redirect::route('mark-average.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

