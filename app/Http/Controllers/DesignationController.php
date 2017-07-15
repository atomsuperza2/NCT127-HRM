<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DepartmentModel;
use App\DesignationModel;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $designations = DesignationModel::get();
     return view('designation.index', ['designations' => $designations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = DepartmentModel::pluck('departmentName','id');
        return view('designation.add', ['department' => $department]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $designation = new DesignationModel($request->all());

        $designation->save();
        return redirect()->route('designation.index')->with('alert-succress','Add new designation success.');
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
      $department = DepartmentModel::pluck('departmentName','id');
      $designation = DesignationModel::find($id);
      return view('designation.edit', ['department' => $department], compact('designation'));
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
      $designation = DesignationModel::find($id);
      $designation->department_id = $request->department_id;
      $designation->designationName = $request->designationName;
      $designation->save();

      session()->flash('message','Updated Successfully');
      return redirect('/designation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $designation = DesignationModel::find($id);
      $designation->delete();
      session()->flash('message','Delete Successfully');
      return redirect('/designation');
    }
}
