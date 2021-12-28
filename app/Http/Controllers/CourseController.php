<?php

namespace App\Http\Controllers;
use App\Models\Course;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listCourse = Course::where('nameCourse','like',"%$search%")->get();
        return view('course.listCourse',[
            'listCourse' => $listCourse,
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.createCourse');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $courseCode = $request->get('code_course');
        $nameCourse = $request->get('name_course');
        $course = new Course();
        $course -> courseCode = $courseCode;
        $course -> nameCourse = $nameCourse;
        $course->save();
        $request->session()->flash('alert-success', 'Khóa học đã được thêm thành công!');
        return redirect()->route('course.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        return view('course.editCourse',[
            'course'=>$course,
        ]);
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
        $courseCode = $request->get('code_course');
        $nameCourse = $request->get('name_course');
        $course = Course::find($id);
        $course-> courseCode = $courseCode;
        $course->nameCourse = $nameCourse;
        $course->save();
        $request->session()->flash('alert-success', 'Khóa đã được cập nhật thành công!');
        return Redirect::route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::where('courseCode',$id)->delete();
        return Redirect::route('course.index');
    }
}
