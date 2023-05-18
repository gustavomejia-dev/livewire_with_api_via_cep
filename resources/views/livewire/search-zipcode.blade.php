<div class="">
    <form class = "rounded-md p-8 bg-blue-100 mx-auto w-1/2 border-solid border-4 border-light-blue-500">
        <h1 class="text-center">Buscar CEP</h1>
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
            "px-4 py-2 bg-blue-500 hover:bg-blue-400 text-white rounded-md mt-3" 
            type ="button" wire:click="save">Cadastrar</button>
            <button class = 
            "px-4 py-2 bg-red-500 hover:bg-red-400 text-white rounded-md mt-3" 
            type ="button" wire:click="">Resetar</button>
        </div>
        

    </form>
    <hr>
    <table class="table-fixed hover:table-fixed">
        <thead>
          <tr>
            <th>ID</th>
            <th>Rua</th>
            <th>CEP</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Ações</th>
          
          </tr>
        </thead>
        <tbody>
            @foreach ($addresses as $address)
                <tr>
                    <td>{{$address['id']}}</td>
                    <td>{{$address['zipcode']}}</td>
                    <td>{{$address['street']}}</td>
                    <td>{{$address['neighborhood']}}</td>
                    <td>{{$address['city']}}</td>
                    <td>{{$address['state']}}</td>
                    <td>
                        <button wire:click='edit' type="button">Editar</button>
                        <button wire:click='remove' type="button">Excluir</button>
                    </td>
                </tr>
          @endforeach
        </tbody>
    </table>    
</div>
