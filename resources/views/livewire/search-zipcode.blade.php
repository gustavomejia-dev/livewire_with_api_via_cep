<div>
    <form class = "p-8 bg-blue-100 mx-auto w-1/2 gap-px">
        <h1>Buscar CEP</h1>
        <div>
            <label for="zipcode">CEP</label>
            <input class = "border" type="text" wire:model.lazy="zipcode"/>
            @error('zipcode')
                <span class = 'text-red-500' >{{$message}}</span>
            @enderror
        </div>
        <div>
            <label for="street">Rua</label>
            <input  class = "border" type="text" wire:model="street"/>
        </div>
        <div>
            <label for="neighborhood">Bairro</label>
            <input class = "border" type="text" wire:model="neigborhood"/>
        </div>
        <div>
            <label for="city">Cidade</label>
            <input  class = "border" type="text" wire:model="city"/>
            @error('city')
                <span class = 'text-red-500' >{{$message}}</span>
            @enderror
        </div>
        <div>
            <label for="state">Estado</label>
            <input class = "border" type="text" wire:model="state"/>
            @error('state')
                <span class = 'text-red-500' >{{$message}}</span>
            @enderror
        </div>
        <div>
            <button class = 
            "px-4 py-2 bg-blue-500 hover:bg-blue-400 text-white rounded-md" 
            type ="button" wire:click="save">Cadastrar</button>
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
