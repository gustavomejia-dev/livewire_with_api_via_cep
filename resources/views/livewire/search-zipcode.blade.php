
<div class="">
    <x-notifications />
    <h1 class="text-center">Informações para Entrega</h1>
    <form class = "rounded-md p-8 bg-blue-100 mx-auto w-1/2 border-solid border-4 border-light-blue-500">
        <div class="flex flex-col w-1/2">
            <x-input wire:model.defer="data.email" label="Email" placeholder="Email" />
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
            <x-button wire:click="save" spinner="reset" dark label="Limpar" />
        </div>
     
        
        

    </form>
    <hr class="mt-2">
    <div class = "my-8 w-1/2 container mx-auto bg-gray-200">
        <x-input wire:model="search" label="Buscar rua" placeholder="Informe o nome da rua" />
        {{-- <x-button wire:click="search" spinner="save" green label="Pesquisar" /> --}}
    <table class="table-auto mx-auto">
        <thead>
          <tr>
            <th>CEP</th>
            <th>Rua</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Ações</th>
          
          </tr>
        </thead>
        <tbody>
            @foreach ($this->address as $address)
                
                <tr>
                   
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

