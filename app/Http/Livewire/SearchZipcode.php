<?php

namespace App\Http\Livewire;

use App\Actions\AddressEditAction;
use App\Actions\AddressStoreAction;

use App\Actions\AddressSearchAction;
use App\Http\Livewire\Traits\AddressPropertiesRulesTrait;
use App\Http\Livewire\Traits\AddressPropertiesMessagesTrait;
use Livewire\Component;

use Illuminate\Support\Facades\DB;

use App\Models\Address;
use App\Models\User;
use WireUi\Traits\Actions;
use App\Services\ViaCepService;
class SearchZipcode extends Component

{   
    use Actions;
    use AddressPropertiesRulesTrait;
    use AddressPropertiesMessagesTrait;

    public array $data = [];
    // public array $addresses = [];// aonde vai vim os dados
    public string $searchState = '';
    public string $searchStreet = '';

    public string $searchPhone = '';
    protected $queryString = ['searchStreet', 'searchState', 'searchPhone'];

    public function mount():void{
        $this->data = AddressEditAction::getEmptyProperties();
        
         
      }

    //o nome do método tem que estár no singular, igual ao da model  
    public function  getAddressProperty(){//propiedades computadas para mostra todos os dados
        
        // if($this->searchStreet || $this->searchState || $this->searchPhone){
            $users = User::join('addresses', 'addresses.id', '=', 'users.id');
            if($this->searchStreet){
                $users->where('addresses.street','LIKE', "%{$this->searchStreet}%");
                }
            if($this->searchState){
                $users->where('addresses.state', $this->searchState);
            }    

            if ($this->searchPhone){
                $users->where('users.celular','LIKE', "%{$this->searchPhone}%");
            }
      
            return $users->paginate(5);
        
  
    }

    // getStateProperty


    
    //metodo magico para fazer requisição após sair do input    
    public function updated(string $key, string $value):void{//key é o name do input e value o cep que vai na API
        if($key === 'data.zipcode'){
            // dd($this->data['email']);
            $dataUser = $this->data;
            $dataAddress = ViaCepService::handle($value);
            if ($dataAddress == null){
                $this->showNotification('error','CEP INVALIDO', 'Por favor informe um CEP Válido !');
            }
            else{
                
                $this->data = array_merge($dataUser, $dataAddress);
                // dd($this->data);
            }
            

            
            
            
        
        
        }
        //$value é o valor retornado do input
        
       
        
        }
        public function save():void{
            
            // sleep(2);
            
            // dd(AddressStoreAction::save($this->data));
            $this->validate();//chamando metodo de validação
            
            AddressStoreAction::save($this->data);
            $this->showNotification('success','Endereço criado com sucesso', 'O endereço foi criado com sucesso !');
        
            $this->render();  
            //resetando formulario inteiro
            // $this->resetExcept('addresses');
                // dd('salvou', $this);//pega os valores magicamente do metodo zipcode
        }
        public function render()
        {
            // $this->addresses = Address::all()->toArray(); //Carrega todos os dados 
            return view('livewire.search-zipcode');
        }

        public function remove(string $id):void{

           Address::find($id)?->delete();
            $this->showNotification('success', 'Exclusão de Endereço', 'Endereço excluido com sucesso');
        }

        public function edit($id){

            $this->data = AddressEditAction::handle($id);
            
        }
        private function showNotification(string $method, string $title, string $message):void{
            // $this->render();
            $this->notification()->$method(
                $title,
                $message, 
            );
        }

     

   
    
    
}
