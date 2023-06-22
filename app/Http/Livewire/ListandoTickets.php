<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;
use App\Http\Livewire\SearchTicket;
use App\Models\Technical;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ListandoTickets extends Component
{   
    public string $searchTicket = '';

    public string $searchTicketStatus = '*';

    public string $searchTechnical = '*';
    public array $selectedMoreTickets = [];//atributo que seleciona as checkbox que estão dentro da listagem de tickets
    
    public string $changeTechnical = '';
    protected $queryString = ['searchTicket', 'searchTicketStatus', 'searchTechnical'];

    public function mount(){
        $this->selectedMoreTickets;
    }    

    public function getTechnicalsProperty(){
        $technicals = Technical::all();
        return $technicals;
    }
    public function getNamesProperty(){
            $names = Ticket::select('nome_remetente')->get();
            return $names; 
        
    }
    public function getTicketsProperty(){
        $tickets = Technical::join('tickets', 'technicals.id', '=', 'tickets.technical_id');
       
        if($this->searchTicket){
            $tickets->where('tickets.assunto', 'LIKE', "%{$this->searchTicket}%");
        }
        if($this->searchTechnical != "*"){
            $tickets->where('technicals.id', '=', "{$this->searchTechnical}");

        }
        if($this->searchTicketStatus != "*"){
            $tickets->where('tickets.status', '=', "{$this->searchTicketStatus}");
        }
        return $tickets->orderBy('tickets.created_at')->get();//aqui é paginate
    }
    

    public function deleteManyTicketsOrOneTicket(){
        if($this->selectedMoreTickets){//itens selecionados para ser feito o procedimento
            Ticket::whereIn('tickets.id', $this->selectedMoreTickets)->delete(); 
            return $this->render();

        }     
    }

    public function updateManyTechnicalsOrOneTechnical(){
        $teste = '1';
        if($this->selectedMoreTickets && $this->changeTechnical){//itens selecionados para ser feito o procedimento
        return Technical::join('tickets', 'technicals.id', '=', 'tickets.technical_id')
            ->whereIn('tickets.id', $this->selectedMoreTickets)->update(['tickets.technical_id' => $this->changeTechnical]);
           
        }
    }
    public function render()
    {
        return view('livewire.listando-tickets')->layout('layouts.tickets');
    }
}
