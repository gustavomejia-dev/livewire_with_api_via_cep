<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Actions\TicketStoreAction;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use \App\Http\Traits\TicketPropertiesMessagesTrait;

class TicketController extends Controller
{   
   

    public array $data = [];

    public function index()
    {   $tickets = Ticket::all();
        return view('tickets.tickets', compact('tickets'));
    }

   
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */



     public function store(StoreTicketRequest $request)
    {   
        $validated = $request->validated();
        // dd($validated);
        TicketStoreAction::save($validated);
        return back();    
    }

    /**
     * Display the specified resource.
     */

     public function list (){
        $tickets = Ticket::paginate(5);
  
        return view('tickets.list-tickets', compact('tickets'));
     }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $ticket = Ticket::find($id);
        return $ticket->toJson();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
        
    {   
        
        
        Ticket::where('id','=', $request->id)->update([
            'status'        =>  $request->status,
            'texto'         =>  $request->texto,
            'email'         => $request->email,
            'nome_remetente'=> $request->nome_remetente    
        ]);
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
