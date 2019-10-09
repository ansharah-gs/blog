<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class TicketsController extends Controller
{
    public function index(){
    	$tickets = Ticket::all();
    	return view('tickets.index',compact('tickets'));
    }

    public function create(){
        return view('tickets.create');

    }

    public function store(){
        request()->validate([
            'name'=> 'required']);
        $tickets= new ticket();
        $tickets->name= request ('name');
        $is_saved = $tickets->save();

        if($is_saved):
            $return['msg'] = 'ticket saved succesfully.';
            $return['status'] = 'success';
        else:
            $return['msg'] = 'something is wrong';
            $return['status'] = 'failure';
        endif;
        return json_encode($return);

    }

     public function show(){
    	dd('hey');
    }

    public function edit($id){
        $ticket=Ticket::where('id',$id)->first();
        return view('tickets.edit',compact('ticket'));
    	
    }

    public function update(){
        $id=request()->id;
        //dd(request()->all());
         $ticket=Ticket::where('id',$id)->first();
        $ticket->name = request('name');
        $ticket->save();
       return redirect ('/tickets');
    	
    }
    public function destroy($id){

        $ticket = Ticket::findorFail($id)->delete();
    	return redirect ('/tickets');
    }
}
