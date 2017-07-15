<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DepartmentModel;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $departments = DepartmentModel::all();
     return view('department.index', ['departments' => $departments]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $department = new DepartmentModel;

      $department->departmentName =$request -> departmentName;

      $department->save();

      return redirect()->route('department.index')->with('alert-succress','Add new department success.');
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
      $department = DepartmentModel::find($id);
      return view('department.edit', compact('department'));
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
       $department = DepartmentModel::find($id);
       $department->departmentName = $request->departmentName;
       $department->save();

       session()->flash('message','Updated Successfully');
       return redirect('/department');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $department = DepartmentModel::find($id);
      $department->delete();
      session()->flash('message','Delete Successfully');
      return redirect('/department');
    }
}
