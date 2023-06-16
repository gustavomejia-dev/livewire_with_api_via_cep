<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;
use App\Http\Livewire\SearchTicket;
use Illuminate\Database\Eloquent\Collection;

class ListandoTickets extends Component
{   
    public string $searchTicket = '';

    public string $searchTicketStatus = '*';

    public string $searchName = '*';
    public array $data = [];

    protected $queryString = ['searchTicket', 'searchTicketStatus'];

    public function mount(){
        
        
    }
    public function getNamesProperty(){
            $names = Ticket::select('nome_remetente')->get();
            return $names; 
        
    }
    public function getTicketsProperty(){
        $tickets  = Ticket::select('*');
        if($this->searchTicket){

            $tickets->where('assunto', 'LIKE', "%{$this->searchTicket}%");
            
        }

        if($this->searchName != "*"){
            $tickets->where('nome_remetente', '=', "{$this->searchName}");
        }
        if($this->searchTicketStatus != "*"){
            $tickets->where('status', '=', "{$this->searchTicketStatus}");
        }

        return $tickets->orderBy('created_at')->get();//aqui é paginate
    }
    
    public function render()
    {
        return view('livewire.listando-tickets')->layout('layouts.tickets');
    }
}
