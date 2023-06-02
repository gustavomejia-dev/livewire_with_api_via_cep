<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Actions\TicketStoreAction;
use App\Http\Requests\StoreTicketRequest;
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
        TicketStoreAction::save($validated);
        return back();    
    }

    /**
     * Display the specified resource.
     */

     public function list (){

        $tickets = Ticket::all();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
