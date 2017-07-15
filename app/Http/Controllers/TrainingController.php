<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrainingModel;
use App\TrainingprogramModel;
use App\AccountInfo;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $training = TrainingModel::all();
     return view('training.index', ['training' => $training]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $trainingprogram = TrainingprogramModel::pluck('trainingP','id');
      return view('training.add', ['trainingprogram' => $trainingprogram]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $training = new TrainingModel($request->except(['searchname']));

      $training->save();
      return redirect()->route('training.index')->with('alert-succress','Add new training success.');
    }

    public function usertraining($id)
    {
      $trainingprogram = TrainingprogramModel::pluck('trainingP','id');
      $accounts = AccountInfo::find($id);
      return view('training.usertraining',['trainingprogram' => $trainingprogram], compact('accounts'));
    }

    public function storetraining(Request $request, $id){
      $accounts = AccountInfo::find($id);

      $training = new TrainingModel();
      $training->user_id = $request->user_id;
      $training->trainingprogram_id = $request->trainingprogram_id;
      $training->dateStart = $request->dateStart;
      $training->dateEnd = $request->dateEnd;
      $training->shiftStart = $request->shiftStart;
      $training->shiftEnd = $request->shiftEnd;
      $training->save();



      return redirect("/accounts/$id/profile");

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
      $trainingprogram = TrainingprogramModel::pluck('trainingP','id');
      $training = TrainingModel::find($id);
      return view('training.edit', ['trainingprogram' => $trainingprogram] ,compact('training'));
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
      $training = TrainingModel::find($id);
      $training->user_id = $request->user_id;
      $training->trainingprogram_id = $request->trainingprogram_id;
      $training->dateStart = $request->dateStart;
      $training->dateEnd = $request->dateEnd;
      $training->shiftStart = $request->shiftStart;
      $training->shiftEnd = $request->shiftEnd;
      $training->save();
      session()->flash('message','Updated Successfully');
      return redirect('/training');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $training = TrainingModel::find($id);
      $training->delete();
      session()->flash('message','Delete Successfully');
      return redirect('/training');
    }
}
