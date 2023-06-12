<div>
    <x-sidebar/>
<div class="">
    <x-notifications />
    <h1 class="text-center">Informações para Entrega</h1>
    <form class = "rounded-md p-8 bg-blue-100 mx-auto w-1/2 border-solid border-4 border-light-blue-500">
        <div class="flex flex-col w-1/2">
            <x-input wire:model.defer="data.name" label="Nome" placeholder="Name" />
        </div>
        <div class="flex flex-col w-1/2">
            <x-input wire:model.defer="data.email" label="Email" placeholder="Email" />
        </div>
        <div class="flex flex-col w-1/2">
            <x-input wire:model.defer="data.celular" label="Celular" placeholder="Celular" />
        </div>
        <div class="flex flex-col w-1/2">
            {{-- <x-input wire:model.defer="data.password" label="Senha" placeholder="Senha" /> --}}
            <x-inputs.password wire:model.defer="data.password" label="Senha" placeholder="Senha"/>
        </div>
        
        <div class="flex flex-col w-1/2">
            <x-input wire:model.lazy="data.zipcode" label="CEP" placeholder="Digite o seu CEP" />
        </div>
        <div class="flex flex-col w-1/2">
            <x-input wire:model="data.street" label="Rua" placeholder="Digite a Rua" />
        </div>
        <div class="flex flex-col w-1/2">
            <x-input wire:model="data.neighborhood" label="Bairro" placeholder="Digite o Bairro"/>
        </div>
        <div class="flex flex-col w-1/2">
            <x-input wire:model="data.city" label="Cidade" placeholder="Digite a cidade" />
        </div>
        <div class="flex flex-col w-1/2">
            <x-input wire:model="data.state" label="Estado" placeholder="Digite o Estado" />
        </div>
        <div class = 'mt-3'>
            <x-button wire:click="save" spinner="save" green label="Cadastrar" />
            
            
        </div>
     
        
        

    </form>
    <hr class="mt-2">
    <div class = "mt-3 mx-auto container w-1/2">
        <h1 class = "justify-center text-center text-stone-500">Quantidade de resultados: {{$this->address->total()}}</h1>
        
    </div>

    <section class = "bg-blue-100 w-1/2 mx-auto rounded-md">
        <div class =  "mt-3 mx-auto container w-1/2">
            <x-input wire:model.defer="searchStreet" label="Buscar rua" placeholder="Informe o nome da rua" />
        </div>
        <div class =  "mt-3 mx-auto container w-1/2">
            <x-input wire:model.defer="searchPhone" label="Buscar Celular" placeholder="Informe o celular" />
        </div>
        <div class = "mx-auto mt-3 text-center">
            <label for="state">Busque por Estado:</label>
            <select wire:model.defer = 'searchState' id="state"> 
                 <option value = "*">Todos</option>
                @foreach ($this->state as $state)
                    <option value="{{$state->state}}">{{$state->state}}</option>
                @endforeach
            </select>
            <x-button wire:click="getAddressProperty" spinner="getAddressProperty" green label="Buscar" />
            <x-button wire:click="toClean" dark label="Limpar Filtro" />
        </div>
    </section>
    <div class = "py-3 my-8 w-1/2 container mx-auto bg-gray-200">
        {{-- <x-button wire:click="search" spinner="save" green label="Pesquisar" /> --}}
    <table class="table-auto mx-auto w-1/2">
        <thead>
          <tr>
            <th class = "px-2">Nome</th>
            <th class = "px-2" >Email</th>
            <th class = "px-2" >Celular</th>
            <th class = "px-2">CEP</th>
            <th class = "px-2">Rua</th>
            <th class = "px-2">Bairro</th>
            <th class = "px-2">Cidade</th>
            <th class = "px-2">Estado</th>
            <th class = "px-2">Ações</th>
          
          </tr>
        </thead>
        <tbody>
            @foreach ($this->address as $address)
                
                <tr>
                    <td class="border px-4 py-2">{{$address->name}}</td>
                    <td class="border px-4 py-2">{{$address->email}}</td>
                    <td class="border px-4 py-2">{{$address->celular}}</td>
                    <td class="border px-4 py-2">{{$address->zipcode}}</td>
                    <td class="border px-4 py-2">{{$address->street}}</td>
                    <td class="border px-4 py-2">{{$address->neighborhood}}</td>
                    <td class="border px-4 py-2">{{$address->city}}</td>
                    <td class="border px-4 py-2">{{$address->state}}</td>
                    <td class="border px-4 py-2">
                        <button class = "px-4 py-2 bg-blue-500 hover:bg-blue-400 text-white rounded-md " 
                        wire:click='edit({{$address->id}})' type="button">Editar</button>
                        <button class = "px-4 py-2 bg-red-500 hover:bg-red-400 text-white rounded-md "  
                        wire:click="remove({{$address->id}})" type="button">Excluir</button>
                    </td>
                </tr>
          @endforeach
        </tbody>
    </table>    
    {{-- paginete --}}
    <div class="flex justify-end">
        {!! $this->address->links() !!} 
    </div>
</div>

</div>