<?php

namespace App\Actions;
use App\Models\Address;
use App\Models\User;
class AddressStoreAction {



    public static function save(array $data):void{
       
        $address = Address::updateOrCreate(
            [
                'zipcode' => $data['zipcode'],//condição where
            ],
            [   
                //salva no banco 
                
                'street' => $data['street'],
                'neighborhood' => $data['neighborhood'],
                'city' => $data['city'],
                'state' => $data['state'],
                
                
            ]
            );
           
            
        User::create([
            'name' => $data['name'],
            'email'  => $data['email'],
            'celular' => $data['celular'],
            'address_id' => $address->id,
            'password' => $data['password'],
        ]);

        
        
 
    }
}
