<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;

class SearchTicket extends Component
{

    public string $searchTicket = '';

    protected $queryString = ['searchTicket'];


    public function mount(){
        $this->searchTicket = 'TESTE';

    }
    public function getTicketProperty(){
        dd($this->searchTicket);
    }
    public function render()
    {   
        return view('livewire.search-ticket');
    }
}
