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
    protected array $data = [];
    public string $searchTicketStatus = '*';

    public string $searchTechnical = '*';
    public array $selectedMoreTickets = [];//atributo que seleciona as checkbox que estão dentro da listagem de tickets
    
    public string $changeTechnical = '';
    public string $changeStatus = '';
    protected $queryString = ['searchTicket', 'searchTicketStatus', 'searchTechnical'];
  
    public function getTechnicalsProperty(){
        $technicals = Technical::all();
        return $technicals;
    }
    

    public function getStatusProperty(){
        $ticketsAbertos = Ticket::select('status')->where('status', '=', 'A')->get();
        
        $tickersPendentes = Ticket::select('status')->where('status', '=', 'P')->get();
        $ticketsResolvidos = Ticket::select('status')->where('status', '=', 'R')->get();
        
        $geral = array('A' => $ticketsAbertos, 'P' => $tickersPendentes, 'R' => $ticketsResolvidos);
       
        return $geral;
    }
public function mount(){
    $this->getStatusProperty();
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



    public function updateManyTechnicalsOrManyStatus(){
        //testando essa função
        
        $changeStatusOrChangeTechnical = $this->changeStatus ? ['tickets.status' => $this->changeStatus] : ['tickets.technical_id' => $this->changeTechnical];
        if($this->selectedMoreTickets && array_values($changeStatusOrChangeTechnical)){//itens selecionados para ser feito o procedimento
            Technical::join('tickets', 'technicals.id', '=', 'tickets.technical_id')
                ->whereIn('tickets.id', $this->selectedMoreTickets)
                ->update($changeStatusOrChangeTechnical);
                
            $this->selectedMoreTickets = [];
            $this->changeTechnical = ''; 
            $this->changeStatus = '';   
            
            
        }
        
    }
    
    public function render()
    {
        return view('livewire.listando-tickets')
        ->layout('layouts.tickets');
    }


}
