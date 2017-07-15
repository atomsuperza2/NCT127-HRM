<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AwardsModel;
use App\AccountInfo;

class AwardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $awards = AwardsModel::get();
      return view('awards.index', ['awards' => $awards]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('awards.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $awards = new AwardsModel($request->except(['searchname']));
      $awards->save();
      return redirect()->route('awards.index')->with('alert-succress','Add new awards success.');
    }

    public function usercreateaward($id)
    {

      $accounts = AccountInfo::find($id);
      return view('awards.adduseraward', compact('accounts'));
    }

    public function storeaward(Request $request, $id){
      $accounts = AccountInfo::find($id);

      $awards = new AwardsModel();
      $awards->user_id = $request->user_id;
      $awards->awardName = $request->awardName;
      $awards->giftItem = $request->giftItem;
      $awards->cashPrice = $request->cashPrice;
      $awards->save();



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
      $awards = AwardsModel::find($id);
      return view('awards.edit', compact('awards'));
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
      $awards = AwardsModel::find($id);
      $awards->user_id = $request->user_id;
      $awards->awardName = $request->awardName;
      $awards->giftItem = $request->giftItem;
      $awards->cashPrice = $request->cashPrice;
      $awards->save();
      session()->flash('message','Updated Successfully');
      return redirect('/awards');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $awards = AwardsModel::find($id);
      $awards->delete();
      session()->flash('message','Delete Successfully');
      return redirect('/awards');
    }
}
