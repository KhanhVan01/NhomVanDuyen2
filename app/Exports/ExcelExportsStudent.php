<?php

namespace App\Exports;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExcelExportsStudent implements FromCollection,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return Student::select('studentCode','email','firstName','middleName','lastName','dateOfBirth','genDer','phone','address')->get();
        // return ExcelStudent::all();
    }
    public function headings() :array {
    	return ["Mã sinh viên", "Email", "Tên", "Tên đệm","Họ","Ngày sinh","Giới tính","Số điện thoại","Địa Chỉ"];
    }
}

// use App\Models\Grade;
// use App\Models\Student;
// use Illuminate\Contracts\View\View;
// use Maatwebsite\Excel\Concerns\FromView;

// class ExcelExportsStudent implements FromView 
// {
//     public function view():View 
//     {
//          $listGrade = Grade::join("course", "grade.courseCode", "=", "course.courseCode")
//         ->get();
//         $listStudent = Student::join("grade", "student.classCode", "=", "grade.classCode")
//                 ->join("course", "grade.courseCode", "=", "course.courseCode")
//                 ->orderBy('grade.classCode','DESC')
//                 ->get(); 
//         $filter = $_POST('filter');
//         return view('student.listStudent', [
//             'listStudent' => $listStudent,
//             'listGrade' => $listGrade,
//             'filter' => $filter,
//         ]);
//     }
// }