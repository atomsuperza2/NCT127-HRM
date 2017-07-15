<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CutoffModel;

class CutoffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cutoff = CutoffModel::all();
     return view('cutoff.index', ['cutoff' => $cutoff]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cutoff.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cutoffs = new CutoffModel($request->all());
        $cutoffs->save();
        return redirect()->route('cutoff.index')->with('alert-succress','Add new cutoff success.');
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
        $cutoffs = CutoffModel::find($id);
        return view('cutoff.edit', compact('cutoffs'));
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
        $cutoffs = CutoffModel::find($id);
        $cutoffs->dateStart = $request->dateStart;
        $cutoffs->dateEnd = $request->dateEnd;
        $cutoffs->save();
        session()->flash('message','Updated Successfully');
        return redirect('/cutoff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $cutoffs = CutoffModel::find($id);
      $cutoffs->delete();
      session()->flash('message','Delete Successfully');
      return redirect('/cutoff');
    }
}
