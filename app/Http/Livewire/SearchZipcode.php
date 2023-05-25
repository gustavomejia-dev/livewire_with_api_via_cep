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
    
    public string $search = '';

    protected $queryString = ['search'];

    public function mount():void{
        $this->data = AddressEditAction::getEmptyProperties();
        
         
      }

    //o nome do método tem que estár no singular, igual ao da model  
    public function  getAddressProperty(){//propiedades computadas para mostra todos os dados
        if ($this->search){
            //se tiver algo no input search ele já faz a requisição
            // dd($this->search);
            // return Address::where('zipcode', 'like', "%{$this->search}%")->paginate(5);
            // $teste =  $searchUsers = DB::table('users')->join('addresses', 'addresses.id', '=', 'users.id')->where('addresses.zipcode','like ', '%023%')->get();
            // dd($teste);
            $searchUsers = DB::table('users')->join('addresses', 'addresses.id', '=', 'users.id')->where('addresses.street', 'like', "%{$this->search}%")->paginate(2);
            // dd($searchUsers);
            // dd($searchUsers);
            return $searchUsers;
          
        }
        $infoUsers = DB::table('users')
             ->join('addresses', 'addresses.id', '=', 'users.id')
             ->select('*')
             ->paginate(5);
        return $infoUsers;    
        // dd($query);

        // $address = Address::paginate(5);
        // return $address;
  
    }
    
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
