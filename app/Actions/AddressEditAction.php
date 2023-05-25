<?php
namespace App\Actions;
use App\Models\Address;
class AddressEditAction {
    public static function handle(string $id):array{
        $address = Address::find($id)->toArray();
        // dd($address);
            // dd($address);
            
            

            return [
                'name' => $address['name'],
                'email' => $address['email'],
                'celular' => $address['celular'],
                'zipcode' => $address['zipcode'],
                'street' => $address['street'],
                'neighborhood' =>$address['neighborhood'],
                'city' => $address['city'],
                'state'=> $address['state'],
            
            ];
    }

    public static function getEmptyProperties():array{

       return [
            'name' => '',
            'email' =>'',
            'celular' => '',
            'zipcode' => '',
            'street' => '',
            'neighborhood' => '',
            'city' => '',
            'state' => ''
        ];
    }
}