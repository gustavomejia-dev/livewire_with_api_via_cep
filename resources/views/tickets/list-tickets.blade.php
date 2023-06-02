<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listar Tickets</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>
    <div> 
        <x-sidebar/> 
    </div>
    
    <section class="flex-row justi">
        @foreach ($tickets as $ticket)
        <div class="flex justify-center items-top border rounded-md border-x-slate-500 h-26 my-6 w-1/2">
            
            <ul class="w-1/2 max-w-md divide-y divide-gray-200 dark:divide-gray-700 my-2">
                <li class="pb-3 sm:pb-4 px-2">
                <div class="flex items-center space-x-4">
                  
                    <div class="flex-1 min-w-0">
                        <p class="py-6 text-sm font-medium text-gray-900 truncate dark:text-white">
                            Número do Ticket
                        </p>
                        <p class="text-md text-gray-500 truncate dark:text-gray-400">
                            #{{$ticket->id}}
                        </p>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            {{$ticket->nome_remetente}}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            {{$ticket->email}}
                        </p>
                    </div>
                    <div class="flex-1 min-w-0">
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
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        <span>ITEM 1</span>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        <span>item 2</span>
                    </div>
                </div>
                </li>
            </ul>
        </div>
        @endforeach
    </section>   
    
    
    @livewireScripts
    @wireUiScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>