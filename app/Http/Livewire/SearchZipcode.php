<?php

namespace App\Http\Livewire;




use Livewire\Component;

use App\Models\Address;
use Illuminate\Support\Facades\Http;
class SearchZipcode extends Component

{   public array $addresses = [];// aonde vai vim os dados

    public string $zipcode = '';
    public string $street = '';
    public string $neighborhood= '';
    public string $city = '';
    public string $state = '';
    protected array $rules = [
        'zipcode' =>        ['required'],
        'street' =>         ['required'],
        'neigborhood' =>    ['required'],
        'city' =>           ['required'],
        'state' =>          ['required', 'max:2'],

    ];//validações de request
    protected $messages = [//validações com menssagens
        'zipcode.required' => 'o Campo CEP É obrigatório',
        'street.required' => 'o Campo ENdereço É obrigatório',
        'neighborhood.required' => 'o Campo BAIRRO É obrigatório',
        'city.required' => 'o Campo CIDADE É obrigatório',
        'state.required' => 'o Campo Estado  É obrigatório',
        'state.max'       => 'PREENCHA COORRETAMENTE'
    ];


    public function mount():void{
        
        $this->addresses = Address::all()->toArray();  
      }
    
    //metodo magico para fazer requisição após sair do input    
    public function updatedZipcode(string $value){
       
        //$value é o valor retornado do input
        $response = Http::get("https://viacep.com.br/ws/{$value}/json/")->json();
        //iniciando os inputs(atributis) com o retorno da API
        // dd($response['bairro']);
        $this->zipcode = $response['cep'];
        $this->neighborhood = $response['bairro'];
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
            
            $this->validate();//chamando metodo de validação
           Address::updateOrCreate(
                [
                    'zipcode' => $this->zipcode,//condição where
                ],
                [   //salva no banco 
                    'street' => $this->street,
                    'neighborhood' => $this->neigborhood,
                    'city' => $this->city,
                    'state' => $this->state,
                    
                    
                ]
                
        );
        //resetando formulario inteiro
        $this->reset();
            // dd('salvou', $this);//pega os valores magicamente do metodo zipcode
        }
        public function render()
        {
            return view('livewire.search-zipcode');
        }
}
