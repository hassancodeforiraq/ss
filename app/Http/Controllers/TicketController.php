<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Xray;
use Session;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::page()->paginate(10);
        // $tickets = Ticket::page()->get();
        // $tickets = Ticket::page()->where('name','like','%' . request('search') . '%')
        // ->orWhere('age','like', '%' . request('search') . '%')
        // ->get();
        
        return view('tickets.index')->with('tickets',$tickets);
    }
    



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.add');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        // $name = Ticket::get('gender');
        // dd($request->has('gender'));
      
        $data = $this->validate($request,[
            'name'    => 'required',
            'age'     => 'required',
            // 'gender'  => 'required',
            'place'   => 'required',
            'phone'   => 'required'
        ]);
       
        if($request->has('gender')) {
            $a = true;
        }elseif($request->has('gender') == NULL){
            $a = false;
        }
        // dd($a);
        // $ticket = Ticket::create($data);
         $ticket = Ticket::create([
                'name'    => $request->name,
                'age'     => $request->age,
                'gender'  => $a,
                'place'   => $request->place,
                'phone'   => $request->phone
            ]);
            $ticket->attach($request->gender);

      //dd( $ticket);
        




        // $request->validate([
        //     'name'    => 'required',
        //     'age'     => 'required',
        //     // 'gender'     => 'required',
        //     'place'   => 'required',
        //     'phone'   => 'required'
        // ]);

        // $data_store = $request->except(['_token']);
       // dd( $request->all() );
        //Ticket::create($data_store);

        // if($request->has('gender')){ 
        //     $data_store->gender = $request->input('gender'); 
        // }else{ 
        //     $data_store->gender = 0; 
        // }
        // ,
        // [
        //     'name.required'   => 'يرجى ملىء حل الاسم',
        //     'age.required'    => 'A message is required',
        //     'gender.required' => 'A message is maaaaarrrrrredd',
        //     'place.required'  => 'وين ساكن الحلو',
        //     'phone.required'  => 'خلي رقم التلفون ورد'
        // ]
    
       
       
           
        // $ticket = new Ticket;
        // $ticket = Ticket::create([
        //         'name'    => $request->name,
        //         'age'     => $request->age,
        //         'gender'  => $request->gender,
        //         'place'   => $request->place,
        //         'phone'   => $request->phone
        //     ]);
            // or Just
            
           
          

           // dd( $ticket);
        $xray = Xray::create([
            'ticket_id' => $ticket->id
        ]);
       
        Session::flash('success','Successfly ..'.$ticket->name);
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
        $ticket = Ticket::find($id);
        return view('tickets.edit')->with('tickets',$ticket);
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
        $ticket = Ticket::find($id);
        $data = $this->validate($request,[
            'name'    => 'required',
            'age'     => 'required',
            // 'gender'  => 'required',
            'place'   => 'required',
            'phone'   => 'required'
        ]);

        if($request->has('gender')) {
            $a = true;
        }elseif($request->has('gender') == NULL){
            $a = false;
        }

        $ticket->name = $request->name;
        $ticket->age = $request->age;
        $ticket->gender = $a;
        $ticket->place = $request->place;
        $ticket->phone = $request->phone;
        $ticket->save();
        // $ticket->update($data);
        Session::flash('success','Successfly ..'.$ticket->name);
        //$ticket->attach($request->gender);
        return redirect()->route('tickets');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return redirect()->back();
    }
}
