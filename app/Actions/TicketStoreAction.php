<?php

namespace App\Actions;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Collection;

class TicketStoreAction{

    public static function save (array $data){
        
        $ticket = Ticket::updateOrCreate(
            [
                'email' => $data['email'],
            ],
            [
                'status' => $data['status'],
                'texto' => $data['texto'],
                'nome_remetente' => $data['nome_remetente'],
            ]


            );

    }

}