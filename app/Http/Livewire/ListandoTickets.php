<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;

class ListandoTickets extends Component
{


    public function getTicketsProperty(){
        $tickets = Ticket::all();
        return $tickets;
    }
    public function render()
    {
        return view('livewire.listando-tickets')->layout('layouts.tickets');
    }
}
