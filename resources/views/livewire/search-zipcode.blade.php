
<div class="">
    <x-notifications />
    <h1 class="text-center">Informações para Entrega</h1>
    <form class = "rounded-md p-8 bg-blue-100 mx-auto w-1/2 border-solid border-4 border-light-blue-500">
        <div class="flex flex-col w-1/2">
            <label for="zipcode ">Email</label>
            <input class = "rounded-md border-solid border-4 border-light-blue-500  focus:outline-none" type="text" wire:model="email"/>
            @error('email')
                <span class = 'text-red-500' >{{$message}}</span>
            @enderror
        </div>
        
        <div class="flex flex-col w-1/2">
            <label for="zipcode ">CEP</label>
            <input class = "rounded-md border-solid border-4 border-light-blue-500  focus:outline-none" type="text" wire:model.lazy="zipcode"/>
            @error('zipcode')
                <span class = 'text-red-500' >{{$message}}</span>
            @enderror
        </div>
        <div class="flex flex-col w-1/2">
            <label for="street">Rua</label>
            <input  class = "rounded-md border-solid border-4 border-light-blue-500  focus:outline-none" type="text" wire:model="street"/>
        </div>
        <div class="flex flex-col w-1/2">
            <label for="neighborhood">Bairro</label>
            <input class = "rounded-md border-solid border-4 border-light-blue-500  focus:outline-none" type="text" wire:model="neighborhood"/>
        </div class="flex flex-col w-1/2">
        <div class="flex flex-col w-1/2">
            <label for="city">Cidade</label>
            <input  class = "rounded-md border-solid border-4 border-light-blue-500  focus:outline-none" type="text" wire:model="city"/>
            @error('city')
                <span class = 'text-red-500' >{{$message}}</span>
            @enderror
        </div>
        <div class="flex flex-col w-1/2">
            <label for="state">Estado</label>
            <input class = "rounded-md border-solid border-4 border-light-blue-500  focus:outline-none" type="text" wire:model="state"/>
            @error('state')
                <span class = 'text-red-500' >{{$message}}</span>
            @enderror
        </div>
        <div>
            <button class = 
            "px-4 py-2 bg-green-500 hover:bg-green-400 text-white rounded-md mt-3" 
            type ="button" wire:click="save">Cadastrar</button>
            <button class = 
            "px-4 py-2 bg-red-500 hover:bg-red-400 text-white rounded-md mt-3" 
            type ="button" wire:click="">Resetar</button>
        </div>
     
        
        

    </form>
    <hr class="mt-2">
    <div class = "my-8 w-1/2 container mx-auto bg-gray-200">
    <table class="table-auto">
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
            @foreach ($addresses as $address)
                <tr>
                   
                    <td class="border px-4 py-2">{{$address['zipcode']}}</td>
                    <td class="border px-4 py-2">{{$address['street']}}</td>
                    <td class="border px-4 py-2">{{$address['neighborhood']}}</td>
                    <td class="border px-4 py-2">{{$address['city']}}</td>
                    <td class="border px-4 py-2">{{$address['state']}}</td>
                    <td class="border px-4 py-2">
                        <button class = "px-4 py-2 bg-blue-500 hover:bg-blue-400 text-white rounded-md " wire:click='edit' type="button">Editar</button>
                        <button class = "px-4 py-2 bg-red-500 hover:bg-red-400 text-white rounded-md "  wire:click='remove' type="button">Excluir</button>
                    </td>
                </tr>
          @endforeach
        </tbody>
    </table>    
</div>

