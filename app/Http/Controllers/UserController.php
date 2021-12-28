<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Major;
use App\Models\Course;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function dash(){
        return view('user.dashboard');
    }
    public function index($id)
    {
        $listStudent = Student::join("grade", "student.classCode", "=", "grade.classCode")
            ->join("course", "grade.courseCode", "=", "course.courseCode")
            ->find($id);
        return view('user.profile', [
            'listStudent' => $listStudent,
        ]);
    }

    public function editProfile(Request $request, $id)
    {
        $fname = $request->get('fname');
        $mname = $request->get('mname');
        $lname = $request->get('lname');
        $dob = $request->get('dob');
        $gender = $request->get('gender');
        $phone = $request->get('phone');
        $address = $request->get('address');
        $student = Student::find($id);
        $student->firstName = $fname;
        $student->middleName = $mname;
        $student->lastName = $lname;
        $student->dateOfBirth = $dob;
        $student->genDer = $gender;
        $student->phone = $phone;
        $student->address = $address;
        $student->save();
        $request->session()->flash('alert-info', 'Hồ sơ đã được cập nhật thành công!');
        return Redirect::route('profile-student', $id);
    }

    public function changePassword($id)
    {
        $student = Student::find($id);
        return view('user.change-pass', [
            'student' => $student,
        ]);
    }

    public function changePasswordProcess(Request $request, $id)
    {
        $old_password = $request->get('curren_password');
        $new_password = $request->get('new_password');
        $new_password_confirmation = $request->get('new_password_confirmation');
        $student = Student::find($id);
        if ($old_password == $student->passWord) {
            if ($new_password == $new_password_confirmation) {
                $student->passWord = $new_password;
                $student->save();
                $request->session()->flash('alert-info', 'Mật khẩu đã được cập nhật thành công!');
                return Redirect::route('password', $student->studentCode);
            } else {
                return Redirect::route('password', $student->studentCode)->with('error1', 'Mật khẩu không khớp!');
            }
        } else {
            return Redirect::route('password', $student->studentCode)->with('error', "Mật khẩu hiện tại không khớp với mật khẩu cũ!");
        }
    }
    public function indexMark($id)
    {
        $student = Student::join("grade", "student.classCode", "grade.classCode")
            ->join("course", "grade.courseCode", "=", "course.courseCode")
            ->join("major", "grade.majorCode", "=", "major.majorCode")
            ->where("studentCode", "=", $id)
            ->get();
        $mark = Mark::join("subject", "mark.subjectCode", "=", "subject.subjectCode")
            ->where("studentCode", "=", $id)
            ->get();
        $count =  Mark::join("subject", "mark.subjectCode", "=", "subject.subjectCode")
            ->where("studentCode", "=", $id)
            ->count();
        $TB = 0;
        foreach ($mark as $val) {
            $TB = $TB + $val->TB;
        }
        if ($count == 0) {
            $count = 1;
        }
        $TBT = round($TB / $count, 1);
        return view('user.list-mark', [
            'mark' => $mark,
            'student' => $student,
            'TBT' => $TBT,
        ]);
    }

    public function indexCalendar()
    {
        return view('user.calendar-user');
    }
}
