<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventModel;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $events = EventModel::all();
     return view('events.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $events = new EventModel($request->all());
        $events->save();
        return redirect()->route('events.index')->with('alert-succress','Add new event success.');
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
        $events = EventModel::find($id);
        return view('events.edit', compact('events'));
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
      $events = EventModel::find($id);
      $events->event_name = $request->event_name;
      $events->event_description = $request->event_description;
      $events->eventStart = $request->eventStart;
      $events->eventEnd = $request->eventEnd;
      $events->save();
      session()->flash('message','Updated Successfully');
      return redirect('/events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $events = EventModel::find($id);
        $events->delete();
        session()->flash('message','Delete Successfully');
        return redirect('/events');
    }
}
