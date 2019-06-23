<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Xray;
class XrayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $xrays = Xray::all();
        $ticket = Ticket::all();
        return view('xrays.index')->with('xrays',$xrays)->with('ticket',$ticket);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tickets = Ticket::all();
        return view('xrays.add')->with('tickets',$tickets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'    => 'required',
            'type'     => 'required',
            'number'   => 'required',
            'ticket_id'   => 'required'
            
        ]);

        $ticket = Xray::create([
            'title'    => $request->title,
            'type'     => $request->type,
            'number'   => $request->number,
            'ticket_id'   => $request->ticket_id
        ]);

        //$ticket->ticket()->attach($request->name);
        return redirect()->back();
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
        $xray = Xray::find($id);
        $tickets = Ticket::all();

        return view('xrays.edit')->with('xrays',$xray)->with('tickets',$tickets);
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
        $xray = Xray::find($id);
        $this->validate($request,[
            'title'    => 'required',
            'type'     => 'required',
            'number'   => 'required'
        ]);

        $xray->title  = $request->title;
        $xray->type   = $request->type;
        $xray->number = $request->number;
        $xray->save();

        // $xray->ticket()->sync($request->title);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $xray = Xray::find($id);
        $xray->delete();
        return redirect()->back();
    }
}
