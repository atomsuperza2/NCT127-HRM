<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BankaccountModel;
class BankaccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $bankaccounts = BankaccountModel::get();

      return view('bankaccount.index', ['bankaccounts' => $bankaccounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('bankaccount.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $bankaccount = new BankaccountModel($request->except(['searchname']));

      $bankaccount->save();
      return redirect()->route('bankaccount.index')->with('alert-succress','Add new bankaccount success.');
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

      $bankaccount = BankaccountModel::find($id);
      return view('bankaccount.edit', compact('bankaccount'));
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
        $bankaccount = BankaccountModel::find($id);
        $bankaccount->user_id = $request->user_id;
        $bankaccount->account_name = $request->account_name;
        $bankaccount->account_number = $request->account_number;
        $bankaccount->bank_name = $request->bank_name;
        $bankaccount->save();
        session()->flash('message','Updated Successfully');
        return redirect('/bankaccount');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $bankaccount = BankaccountModel::find($id);
      $bankaccount->delete();
      session()->flash('message','Delete Successfully');
      return redirect('/bankaccount');
    }
}
