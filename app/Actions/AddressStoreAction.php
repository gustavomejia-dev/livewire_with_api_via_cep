<?php

namespace App\Actions;
use App\Models\Address;
class AddressStoreAction {



    public static function save(array $data):void{
        Address::updateOrCreate(
            [
                'zipcode' => $data['zipcode'],//condição where
            ],
            [   
                //salva no banco 
                
                'email' => $data['email'],
                'street' => $data['street'],
                'neighborhood' => $data['neighborhood'],
                'city' => $data['city'],
                'state' => $data['state'],
                
                
            ]
            );
    }
}
