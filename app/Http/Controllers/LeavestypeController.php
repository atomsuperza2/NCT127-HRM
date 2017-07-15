<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LeavestypeModel;

class LeavestypeController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $leavestype = LeavestypeModel::all();
     return view('leavestype.index', ['leavestype' => $leavestype]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leavestype.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $leavestypes = new LeavestypeModel ($request->all());
        $leavestypes->save();
        return redirect()->route('leavestype.index')->with('alert-succress','Add new leave type success.');
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
      $leavestypes = LeavestypeModel::find($id);
      return view('leavestype.edit', compact('leavestypes'));
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
      $leavestypes = LeavestypeModel::find($id);
      $leavestypes->leavestype = $request->leavestype;
      $leavestypes->save();
      session()->flash('message','Updated Successfully');
      return redirect('/leavestype');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leavestypes = LeavestypeModel::find($id);
        $leavestypes->delete();
        session()->flash('message','Delete Successfully');
        return redirect('/leavestype');
    }
}
