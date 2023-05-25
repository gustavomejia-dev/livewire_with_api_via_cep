<x-modal blur wire:model.defer="blurModal">
    <div class="flex flex-col w-1/2">
        <label for="zipcode ">Email</label>
        <input class = "rounded-md border-solid border-4 border-light-blue-500  focus:outline-none" type="text" wire:model="email"/>
        @error('email')
            <span class = 'text-red-500' >{{$message}}</span>
        @enderror
    </div>
</x-modal>