<?php

namespace App\Actions;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Collection;

class TicketStoreAction{

    public static function save (array $data):void{
        
       
        $ticket = Ticket::updateOrCreate(
            [
                'email' => $data['email'],
            ],
            [
                'status' => $data['status'],
                'assunto' => $data['assunto'],
                'texto' => $data['texto'],
                'technical_id' => $data['technical_id'],
            ]


            );

            

    }

}