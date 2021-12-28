<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listSubject = Subject::get();
        return view('subject.listSubject',[
            'listSubject'=>$listSubject,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject.createSubject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subjectCode = $request->get('code-subject');
        $nameSubject = $request->get('name-subject');
        $hours = $request->get('hour');
        $final = $request->get('final');
        $skill = $request->get('skill');
        $startDate = $request->get('start-date');
        $subject = new Subject();
        $subject -> subjectCode = $subjectCode;
        $subject -> nameSubject = $nameSubject;
        $subject -> totalClassHour = $hours;
        $subject -> final = $final;
        $subject -> skill = $skill;
        $subject -> startDate = $startDate;
        $subject ->save();
        $request->session()->flash('alert-success', 'Môn học đã được thêm thành công!');
        return Redirect::route('subject.index');
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
        $subject = Subject::find($id);
        return view('subject.editSubject',[
            'subject'=>$subject,
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
        $subjectCode = $request->get('code-subject');
        $nameSubject = $request->get('name-subject');
        $totalHours = $request->get('total-hour');
        $final = $request->get('final');
        $skill = $request->get('skill');
        $startDate = $request->get('start-date');
        $subject = Subject::find($id);
        $subject-> subjectCode = $subjectCode;
        $subject->nameSubject = $nameSubject;
        $subject->totalClassHour = $totalHours;
        $subject -> final = $final;
        $subject -> skill = $skill;
        $subject->startDate = $startDate;
        $subject->save();
        $request->session()->flash('alert-success', 'Môn học đã được cập nhật thành công!');
        return Redirect::route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subject::where('subjectCode',$id)->delete();
        return Redirect::route('subject.index');

    }
}
