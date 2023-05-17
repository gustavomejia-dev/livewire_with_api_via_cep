<div>
    <form class = "p-8 bg-blue-100 mx-auto w-1/2 gap-px">
        <h1>Buscar CEP</h1>
        <div>
            <label for="zipcode">CEP</label>
            <input class = "border" type="text" wire:model.lazy="zipcode"/>
            
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
        </div>
        <div>
            <label for="state">Estado</label>
            <input class = "border" type="text" wire:model="state"/>
        </div>
        <div>
            <button class = 
            "px-4 py-2 bg-blue-500 hover:bg-blue-400 text-white rounded-md" 
            type ="button" wire:click="save">Cadastrar</button>
        </div>
        

    </form>
</div>
