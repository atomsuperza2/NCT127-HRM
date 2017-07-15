<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HolidaysModel;

class HolidaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $holidays = HolidaysModel::all();
     return view('holidays.index', ['holidays' => $holidays]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('holidays.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $holidays = new HolidaysModel($request->all());
      $holidays->save();
      return redirect()->route('holidays.index')->with('alert-succress','Add new holidays success.');
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
      $holidays = HolidaysModel::find($id);
      return view('holidays.edit', compact('holidays'));
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
      $holidays = HolidaysModel::find($id);
      $holidays->occasion = $request->occasion;
      $holidays->dateHoliday = $request->dateHoliday;
      $holidays->save();
      session()->flash('message','Updated Successfully');
      return redirect('/holidays');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $holidays = HolidaysModel::find($id);
        $holidays->delete();
        session()->flash('message','Delete Successfully');
        return redirect('/holidays');
    }
}
