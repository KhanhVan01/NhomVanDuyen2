<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listSemester = Semester::where("semesterCode","like","%$search%")->get();
        return view('semester.listSemester',[
            'listSemester'=> $listSemester,
            'search'=> $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('semester.createSemester');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $semesterCode = $request->get('code-semester');
        $nameSemester = $request->get('name-semester');
        $yearSemester = $request->get('year-semester');
        $semester = new Semester();
        $semester->semesterCode = $semesterCode;
        $semester->nameSemester = $nameSemester;
        $semester->year = $yearSemester;
        $semester->save();
        return Redirect::route('semester.index');
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
        $semester = Semester::find($id);
        return view('semester.editSemester',[
            "semester"=>$semester,
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
        $semesterCode = $request->get('code-semester');
        $nameSemester = $request->get('name-semester');
        $year = $request->get('year-semester');
        $semester = Semester::find($id);
        $semester->semesterCode = $semesterCode;
        $semester->nameSemester = $nameSemester;
        $semester->year = $year;
        $semester -> save();
        return Redirect::route('semester.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Semester::where('semesterCode',$id)->delete();
        return Redirect::route('semester.index');
    }
}
