{{-- HEADER --}}
<div class="flex flex-row w-[100%]" x-data="{open: false}">
<header class="w-40"> 
    <x-sidebar/> 
</header>
{{-- FIM DO HEADER --}}


<main  x-data = "{'showModal' : false, 'count' : 0, 'excluirSim' : false}" @keydown.escape="showModal = false" class="rounded-l-lg w-screen h-auto bg-blue-400 flex flex-col mt-[5%] ml-[5%]" > 
    <div class="filament-stats grid gap-4 lg:gap-8 md:grid-cols-3 m-5">
        <div class="filament-stats-card relative p-6 rounded-2xl bg-white shadow dark:bg-gray-800 filament-stats-overview-widget-card">
        <div class="space-y-2">
            <div class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 dark:text-gray-200">
                
                <span>Tickets Abertos</span>
            </div>
    
            <div class="text-3xl">
                {{count($this->status['A'])}}
            </div>
    
                </div>
    
        </div>
    
        <div class="filament-stats-card relative p-6 rounded-2xl bg-white shadow dark:bg-gray-800 filament-stats-overview-widget-card">
            <div class="space-y-2">
                    <div class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 dark:text-gray-200">
                        
                        <span>Tickets Resolvidos</span>
                    </div>
            
                    <div class="text-3xl">
                        {{count($this->status['R'])}}
                    </div>
            
            </div>
        
        </div>
    
        <div class="filament-stats-card relative p-6 rounded-2xl bg-white shadow dark:bg-gray-800 filament-stats-overview-widget-card">
        <div class="space-y-2">
            <div class="flex items-center space-x-2 rtl:space-x-reverse text-sm font-medium text-gray-500 dark:text-gray-200">
                
                <span>Tickets Pendentes</span>
            </div>
    
            <div class="text-3xl">
                {{count($this->status['P'])}}
            </div>
    
                </div>
    
        </div>
    </div>
    <nav x-show="open" x-transition:enter.duration.800ms x-transition:leave.duration.800ms  class="z-0 space-x-4  px-4 mt-[1%] items-center ml-[10%] rounded-lg bg-white w-[1200px] h-44 flex flex-row">
            <h1>Funções Rápidas: </h1>   
                <div class="flex flex-col">
                    <label for="countries" class="block mb-2 text-sm text-center font-medium text-gray-900 dark:text-white">Atribuição em Massa</label>
                    <select x-on:change="excluirSim = false" onchange = alterarTickets()  wire:model.defer = "changeTechnical" id="technicals" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="*" selected>Selecione o Técnico</option>
                            @foreach ($this->technicals as $technical)
                                <option value="{{$technical->id}}">{{ $technical->nome }}</option>
                            @endforeach
            
                    </select>

        
                
                </div>
                <div class="flex flex-col">
                    <label for="countries" class="block mb-2 text-sm text-center font-medium text-gray-900 dark:text-white">Atribuição em Massa</label>
                    <select id = "status" x-on:change="excluirSim = false" onchange=alterarTickets() wire:model.defer = "changeStatus" class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                        <option value="*" selected>Todos</option>
                        <option value="R">Resolvido</option>
                        <option value="P">Pendente</option>
                        <option value="A">Aberto</option>
                  </select> 

        
                </div>
            
               {{-- btn que exclui os tickets selecionados --}}
               <x-button class="px-4" rounded red label="Excluir" id="btnExcluir" x-on:click="excluirSim = true"/>
            {{-- fim do btn que exclui os tickets selecionados --}}
            
    </nav>    
    <div id = "modalAlterarTicket" class="align-middle justify-center hidden bg-black">    
        <x-alert/>
    </div> 
    <section class="mt-[5%] flex-row h-screen justify-center items-center ml-[10%] w-[1200px]">
        
         {{-- aqui está carregando os chamados com um link para mandar para uma modal referente ao ticket --}}
            {{-- FILTROS --}}
            <section class="bg-slate-200 w-auto marker:shadow p-5 rounded-lg">
                <div class="relative">
                    <div class="absolute flex items-center ml-2 h-full">
                        <svg class="w-4 h-4 fill-current text-primary-gray-dark" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.8898 15.0493L11.8588 11.0182C11.7869 10.9463 11.6932 10.9088 11.5932 10.9088H11.2713C12.3431 9.74952 12.9994 8.20272 12.9994 6.49968C12.9994 2.90923 10.0901 0 6.49968 0C2.90923 0 0 2.90923 0 6.49968C0 10.0901 2.90923 12.9994 6.49968 12.9994C8.20272 12.9994 9.74952 12.3431 10.9088 11.2744V11.5932C10.9088 11.6932 10.9495 11.7869 11.0182 11.8588L15.0493 15.8898C15.1961 16.0367 15.4336 16.0367 15.5805 15.8898L15.8898 15.5805C16.0367 15.4336 16.0367 15.1961 15.8898 15.0493ZM6.49968 11.9994C3.45921 11.9994 0.999951 9.54016 0.999951 6.49968C0.999951 3.45921 3.45921 0.999951 6.49968 0.999951C9.54016 0.999951 11.9994 3.45921 11.9994 6.49968C11.9994 9.54016 9.54016 11.9994 6.49968 11.9994Z"></path>
                        </svg>
                    </div>
                  {{-- Buscando Apenas por titulo --}}
                     <input wire:model.debounce.500ms="searchTicket" type="text" placeholder="Pesquise pelo Assunto" class="px-8 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"> 
                 </div>
                
            {{-- FIM DOS FILTROS --}}
                
            {{-- Ordena pelo status do ticket --}}
            <div class= "w-1/2 flex px-4 mb-14 mt-8">
                
                <div class="relative mr-24">
                    <label for="">Status</label>
                    <select wire:model.lazy = "searchTicketStatus" class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                        <option value="*" selected>Todos</option>
                        <option value="R">Resolvido</option>
                        <option value="P">Pendente</option>
                        <option value="A">Aberto</option>
                  </select> 
                </div>
                <div class="relative">
                  <label for="">Técnico Responsável</label>   
                  <select wire:model.lazy = "searchTechnical" class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                        <option value="*" selected>Todos</option>
                        @foreach ($this->technicals as $technical)
                            <option value={{$technical->id}}>{{$technical->nome}}</option>
                        @endforeach
                    
                </select>  
            </div>
        </div>
        
            {{-- fim da ordenação dos status do ticket --}}
        @foreach ($this->tickets as $ticket)
        
        {{-- aqui está carregando os chamados com um link para mandar para uma modal referente ao ticket --}}
            <div class= "cursor-pointer w-[100%] max-lg:" onclick = openModal({{$ticket->id}})>
                
                <div  class="flex justify-center border rounded-lg border-x-slate-800 h-26 my-6 bg-slate-100">
                    <div class="w-40 self-center pl-4">
                        <input  x-on:change="count = ($event.target.checked) ? count+=1 : count-=1"
                         x-on:click="open = true" class ="pl-4 w-[20px] h-[25px]" type="checkbox" wire:model.defer="selectedMoreTickets.{{$ticket->id}}" id="selectedMoreTickets.{{$ticket->id}}" value = "{{$ticket->id}}">
                    </div>
                    <ul class= "w-[800px] justify-center h-auto divide-y divide-gray-200 dark:divide-gray-700 my-2" @click="showModal = true" >
                        <li class="pb-3 sm:pb-4">
                        <div class="flex items-center space-x-24">
                            
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

                                <p>Analista</p>
                            
                                <P class="text-sm text-gray-500 truncate dark:text-gray-400">{{$ticket->nome}}</P>
                               

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

</div>    