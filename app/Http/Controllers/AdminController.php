<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listAdmin = Admin::get();
        return view('admin.list-admin', [
            "listAdmin" => $listAdmin,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $fullName = $request->get('full-name');
        $role = $request->get('role');
        $admin = new Admin();
        $admin->email = $email;
        $admin->password = $password;
        $admin->fullName = $fullName;
        $admin->role = $role;
        $admin->save();
        $request->session()->flash('alert-success', 'Admin was successful added!');
        return Redirect::route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.edit-admin', [
            'admin' => $admin,
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
        $email = $request->get('email');
        $password = $request->get('password');
        $fullName = $request->get('full-name');
        $role = $request->get('role');
        $admin = Admin::find($id);
        $admin->email = $email;
        $admin->password = $password;
        $admin->fullName = $fullName;
        $admin->role = $role;
        $admin->save();
        $request->session()->flash('alert-success', 'Admin was successful updated!');
        return Redirect::route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (Session::exists('admin')) {
            $admin = session('admin')->role;
            if ($admin == 1) {
                $request->session()->flash('alert-warning', "You don't have permission to delete admin");
                return redirect(route('admin.index'));
            } else {
                Admin::where('codeAdmin',$id)->delete();
                return Redirect::route('admin.index');
            }
            
        }
            
        
    }
}

           
                
               
            