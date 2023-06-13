<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class SearchTicket extends Component
{

    public string $searchTicket = '';

    public string $searchAll = '';
    public array $data = [];

    protected $queryString = ['searchTicket', 'searchAll'];


    public function mount(){
        $this->getTicketsProperty();
        // $this->data = Ticket::all()->toArray();
        

    }
    public function getTicketsProperty(){
        $tickets = new Ticket;

        if ($this->searchAll === '*'){
            $this->list();
        
        if($this->searchAll){
            dd($this->searchAll);
        }    
            
        }
    
       
        
        
    }
   
    public function list(){
        $tickets = Ticket::paginate(5);
        return view('tickets.list-tickets', compact('tickets'));
    }

    public function render()
    {   
        return view('livewire.search-ticket');
    }
}
