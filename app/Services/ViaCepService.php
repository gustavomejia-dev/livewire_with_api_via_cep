<?php


namespace App\Services;
use Illuminate\Support\Facades\Http;
class ViaCepService {
    public static function handle(string $zipcode){
        $response = Http::get("https://viacep.com.br/ws/{$zipcode}/json/")->json();
        if($response  != null){
            return [
                
                'zipcode' => $response['cep'],
                'street' => $response['logradouro'],
                'neighborhood' => $response['bairro'],
                'city' => $response['localidade'],
                'state' => $response['uf'], 
            ];
        }
       
        
    }
    

}