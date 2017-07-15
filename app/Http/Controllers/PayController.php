<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PayModel;
use App\AccountInfo;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pays = PayModel::get();
      return view('pay.index', ['pays' => $pays]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pay.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $pays = new PayModel($request->except(['searchname']));
      $pays->save();
      return redirect()->route('pay.index')->with('alert-succress','Add new awards success.');
    }

    public function usercreatepay($id)
    {

      $accounts = AccountInfo::find($id);
      return view('pay.adduserpay', compact('accounts'));
    }

    public function storepay(Request $request, $id){
      $accounts = AccountInfo::find($id);

      $pays = new PayModel();
      $pays->user_id = $request->user_id;
      $pays->title = $request->title;
      $pays->amount = $request->amount;

      $pays->save();



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
      $pays = PayModel::find($id);
      return view('pay.edit', compact('pays'));
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
      $pays = PayModel::find($id);
      $pays->user_id = $request->user_id;
      $pays->title = $request->title;
      $pays->amount = $request->amount;
      $pays->save();
      session()->flash('message','Updated Successfully');
      return redirect('/pay');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $pays = PayModel::find($id);
      $pays->delete();
      session()->flash('message','Delete Successfully');
      return redirect('/pay');
    }
}
