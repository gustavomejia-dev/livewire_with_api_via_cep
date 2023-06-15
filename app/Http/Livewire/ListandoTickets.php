<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;
use App\Http\Livewire\SearchTicket;
use Illuminate\Database\Eloquent\Collection;

class ListandoTickets extends Component
{   
    public string $searchTicket = '';

    public string $searchAll = '';
    public array $data = [];

    protected $queryString = ['searchTicket', 'searchAll'];

    public function mount(){
        
        
    }

    public function getTicketsProperty(){
        $tickets  = Ticket::select('*');
        if($this->searchTicket){
            $tickets = Ticket::where('assunto', 'LIKE', "%{$this->searchTicket}%");
            
        }

        return $tickets->orderBy('created_at')->get();//aqui é paginate
    }
    
    public function render()
    {
        return view('livewire.listando-tickets')->layout('layouts.tickets');
    }
}
