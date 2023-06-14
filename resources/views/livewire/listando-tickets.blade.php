
<main x-data = "{'showModal' : false }" @keydown.escape="showModal = false" class="bg-slate-00" class="flex flex-row bg-state-300">
    
    <div> 
        <x-sidebar/> 
    </div>
    
    <section class="flex-row h-screen justify-center items-center ml-[10%]">
         {{-- aqui está carregando os chamados com um link para mandar para uma modal referente ao ticket --}}
            {{-- FILTROS --}}
            @livewire('search-ticket')
            {{-- FIM DOS FILTROS --}}
        @foreach ($this->tickets as $ticket)
        {{-- aqui está carregando os chamados com um link para mandar para uma modal referente ao ticket --}}
            <div class= "cursor-pointer w-[500px] max-lg:" onclick = openModal({{$ticket->id}})>
                
                <div class="flex justify-center items-top border rounded-md border-x-slate-500 h-26 my-6">
                    
                    <ul class="w-1/2 max-w-md divide-y divide-gray-200 dark:divide-gray-700 my-2" @click="showModal = true" >
                        <li class="pb-3 sm:pb-4 px-2">
                        <div class="flex items-center space-x-4">
                        
                            <div class="flex-2">
                                <p class="py-6 text-sm font-medium text-gray-900 truncate dark:text-white">
                                    ID do Ticket
                                </p>
                                <p class="text-md text-gray-500 truncate dark:text-gray-400">
                                    #{{$ticket->id}}
                                </p>
                            </div>
                            <div class="flex-2">
                                <p class="p-6 text-sm font-medium text-gray-900 truncate dark:text-white">
                                     Assunto
                                </p>
                                <p class="text-md text-gray-500 truncate dark:text-gray-400">
                                    {{$ticket->assunto}}
                                </p>
                            </div>
                            <div class="flex-2 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{$ticket->nome_remetente}}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{$ticket->email}}
                                </p>
                            </div>
                            <div class="flex-2">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Status
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    @if($ticket->status == 'R')
                                        Resolvido
                                    @elseif($ticket->status == 'A')
                                        Aberto
                                    @elseif($ticket->status == 'P')
                                        Pendente
                                    @endif
                                </p>
                            </div>
                        </div>
                        </li>
                    </ul>
                </div>
            
            </div>
        
        @endforeach
        {{-- <div class="row">
            <div class="col-md-12">
                {{ $this->tickets->links('pagination::tailwind') }}
            </div>
        </div> --}}
    </section>  
    
    {{-- MODAL AONDE CARREGA OS DADOS --}}
        <x-modal-when-selected-ticket/>

    {{-- FIM DA MODAL AONDE CARREGA OS DADOS --}}

</main>  
    {{-- FIM DO CARREGAMENTO DOS DADOS --}}