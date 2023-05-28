<?php

namespace App\Actions;
use App\Models\Address;
use App\Models\User;
use App\Models\State;
class AddressStoreAction {



    public static function save(array $data):void{
        // dd($data);
        $address = Address::updateOrCreate(
            [
                'zipcode' => $data['zipcode'],//condição where
            ],
            [   
                //salva no banco 
                'street' => $data['street'],
                'neighborhood' => $data['neighborhood'],
                'city' => $data['city'],
      
                
                
            ]
            );
        $state = State::Create(
                ['state' => $data['state']]
                
            );
            
        $user = User::create([
            'name' => $data['name'],
            'email'  => $data['email'],
            'celular' => $data['celular'],
            'address_id' => $address->id,
            'state_id'  => $state->id,
            'password' => $data['password'],
        ]);

        
        

        
        
 
    }
}
