<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class SearchTicket extends Component
{

  

   


    public function mount(){
      

        // $this->data = Ticket::all()->toArray()
    }

   

    public function render()
    {   
        return view('livewire.search-ticket');
    }
}
