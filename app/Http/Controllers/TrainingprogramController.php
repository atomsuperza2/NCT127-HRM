<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrainingprogramModel;

class TrainingprogramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $trainingprogram = TrainingprogramModel::all();
     return view('trainingprogram.index', ['trainingprogram' => $trainingprogram]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainingprogram.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $trainingprogram = new TrainingprogramModel($request->all());
      $trainingprogram->save();
      return redirect()->route('trainingprogram.index')->with('alert-succress','Add new trainingprogram success.');
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
      $trainingprogram = TrainingprogramModel::find($id);
      return view('trainingprogram.edit', compact('trainingprogram'));
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
      $trainingprogram = TrainingprogramModel::find($id);
      $trainingprogram->trainingP = $request->trainingP;
      $trainingprogram->trainingdiscription = $request->trainingdiscription;
      $trainingprogram->save();
      session()->flash('message','Updated Successfully');
      return redirect('/trainingprogram');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $trainingprogram = TrainingprogramModel::find($id);
      $trainingprogram->delete();
      session()->flash('message','Delete Successfully');
      return redirect('/trainingprogram');
    }
}
