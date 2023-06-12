<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class SearchTicket extends Component
{

    public string $searchTicket = '';
    public array $data = [];

    protected $queryString = ['searchTicket'];


    public function mount(){
        $this->data = Ticket::all()->toArray();
        // dd($this->data);
        // $this->searchTicket = 'TESTE';

    }
    public function getTicketProperty():Collection{
        return Ticket::all();
    }
    public function render()
    {   
        return view('livewire.search-ticket');
    }
}
