<?php
namespace App\Http\Viewcomposer;
use Illuminate\View\View;
use App\Models\Mark;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;

class CatogeryComposer
{

    public function compose(View $view){
        $student = Student::all()->count();
        $grade = Grade::all()->count();
        $subject = Subject::all()->count();
        $mark = Mark::all()->count();
        $view->with('student',$student)->with('grade',$grade)->with('subject',$subject)->with('mark',$mark);
    }
}