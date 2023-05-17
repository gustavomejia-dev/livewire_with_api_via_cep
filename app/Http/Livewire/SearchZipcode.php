<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
class SearchZipcode extends Component

{
    public string $zipcode = '';
    public string $street = '';
    public string $neigborhood = '';
    public string $city = '';
    public string $state = '';
    // public function mount():void{
    //     
    //     // dd($response);
    // }
    //metodo magico para fazer requisição após sair do input    
    public function updatedZipcode(string $value){
        //$value é o valor retornado do input
        $response = Http::get("https://viacep.com.br/ws/{$value}/json/")->json();
        //iniciando os inputs(atributis) com o retorno da API
        // dd($response['bairro']);
        $this->zipcode = $response['cep'];
        $this->neigborhood = $response['bairro'];
        $this->street = $response['logradouro'];
        $this->state= $response['uf'];
        $this->city = $response['localidade'];
       
        
        }
        /*
        "cep" => "02865-090"
        "logradouro" => "Rua Inácio Xavier de Carvalho"
        "complemento" => ""
        "bairro" => "Vila Penteado"
        "localidade" => "São Paulo"
        "uf" => "SP"
        "ibge" => "3550308"
        "gia" => "1004"
        "ddd" => "11"
        "siafi" => "7107"
        */
        public function save():void{
            dd('salvou', $this);//pega os valores magicamente do metodo zipcode
        }
        public function render()
        {
            return view('livewire.search-zipcode');
        }
}
