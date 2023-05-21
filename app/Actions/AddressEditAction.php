<?php
namespace App\Actions;
use App\Models\Address;
class AddressEditAction {
    public static function handle(string $id):array{
        $address = Address::find($id)->toArray();
        // dd($address);
            // dd($address);
            
            

            return [
                'email' => $address['email'],
                'zipcode' => $address['zipcode'],
                'street' => $address['street'],
                'neighborhood' =>$address['neighborhood'],
                'city' => $address['city'],
                'state'=> $address['state'],
            
            ];
    }

    public static function getEmptyProperties():array{
       return [
            'email' =>'',
            'zipcode' => '',
            'street' => '',
            'neighborhood' => '',
            'city' => '',
            'state' => ''
        ];
    }
}