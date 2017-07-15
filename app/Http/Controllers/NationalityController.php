<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NationalityModel;

class NationalityController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $nationality = NationalityModel::all();
     return view('nationality.index', ['nationality' => $nationality]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nationality.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nationalitys = new NationalityModel ($request->all());
        $nationalitys->save();
        return redirect()->route('nationality.index')->with('alert-succress','Add new leave type success.');
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
      $nationalitys = NationalityModel::find($id);
      return view('nationality.edit', compact('nationalitys'));
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
      $nationalitys = NationalityModel::find($id);
      $nationalitys->nationality_name = $request->nationality_name;
      $nationalitys->save();
      session()->flash('message','Updated Successfully');
      return redirect('/nationality');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nationalitys = NationalityModel::find($id);
        $nationalitys->delete();
        session()->flash('message','Delete Successfully');
        return redirect('/nationality');
    }
}
