<?php

namespace App\Http\Controllers;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request->get('search');
        $listMajor = Major::where('nameMajor','like',"%$search%")
        ->get();
        return view('major.listMajor',[
            'listMajor' => $listMajor,
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
        return view('major.createMajor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $majorCode = $request->get('code');
        $nameMajor = $request->get('name');
        $major = new Major();
        $major->majorCode = $majorCode;
        $major->nameMajor= $nameMajor;
        $major->save();
        $request->session()->flash('alert-success', 'Ngành học đã được thêm thành công!');
         return Redirect::route('major.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $major = Major::find($id);
        return $major;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $major= Major::find($id);
        return view('major.editMajor',[
            'major' => $major
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
        $majorCode = $request->get('code-major');
        $nameMajor = $request->get('name-major');
        $major = Major::find($id);
        $major->majorCode = $majorCode;
        $major->nameMajor = $nameMajor;
        $major->save();
        $request->session()->flash('alert-success', ' Ngành đã được cập nhật thành công!');
        return redirect()->route('major.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Major::where('majorCode',$id)->delete();
        return redirect(route('major.index'));
    }

    public function hide($id){
        // Major::where('majorCode',$id);
        echo $id;
        // return Redirect::route('major.index');
    }
}
