<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;
use App\Http\Livewire\SearchTicket;
use App\Models\Technical;
use Illuminate\Database\Eloquent\Collection;

class ListandoTickets extends Component
{   
    public string $searchTicket = '';

    public string $searchTicketStatus = '*';

    public string $searchTechnical = '*';
    public array $data = [];

    protected $queryString = ['searchTicket', 'searchTicketStatus'];


    public function getTechnicalsProperty(){
        $technicals = Technical::all();
        return $technicals;
    }
    public function getNamesProperty(){
            $names = Ticket::select('nome_remetente')->get();
            return $names; 
        
    }
    public function getTicketsProperty(){
        $tickets  = Ticket::join('technicals', 'technicals.id', 'tickets.technical_id');
        if($this->searchTicket){

            $tickets->where('tickets.assunto', 'LIKE', "%{$this->searchTicket}%");
            
        }

        if($this->searchTechnical != "*"){
            $tickets->where('technicals.technical_id', '=', "{$this->searchTechnical}");
        }
        if($this->searchTicketStatus != "*"){
            $tickets->where('tickets.status', '=', "{$this->searchTicketStatus}");
        }

        return $tickets->orderBy('tickets.created_at')->get();//aqui é paginate
    }
    

    public function selectedManyTickets(){
        
    }
    public function render()
    {
        return view('livewire.listando-tickets')->layout('layouts.tickets');
    }
}
