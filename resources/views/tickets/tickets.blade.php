<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar Ticket</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>
    
    <div> 
        <x-sidebar/> 
    </div>

    {{-- caso o usuario seja cadastrado com sucesso será exibida essa div --}}
    @if(session('success'))
        {{-- <div x-data="{show: true}" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="w-[350px]">
            <x-alert title="Ticket Criado com Sucesso" message="Ticket criado com sucesso, caso queira procurar é só ir no meno e na opção listar Tickets" />
        </div>   --}}
    {{-- FIM DA DIV DE USUARIO CADASTRADO COM SUCESSO --}}
        @endif
    <div class="flex h-screen justify-center items-center">
    <section class="w-1/2 align-middle rounded-md border-secondary-600 border py-3 px-3">
        <h2 class="text-center">Abra um Ticket</h2>
        {{-- FORM RESPONSAVEL POR CRIAR UM TICKET --}}
    <form action="{{route('createTicket')}}" method="post">
        @csrf
        <div class="relative z-0 w-full mb-6 group">
            <input type="text" value = "{{old ('email')}}" name="email" id="floating_email" class="block py-2.5 px-0 w-1/2 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
            @if($errors->has('email'))
               <span class="text-sm text-rose-600">{{$errors->first('email')}}</span>
            @endif
        </div>
        <div class="relative z-0 w-full mb-6 group">
            <input type="text" value = "" name="assunto" id="idAssunto" class="block py-2.5 px-0 w-1/2 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="assunto" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Assunto</label>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
          <div class="relative z-0 w-full mb-6 group">
              <input value = "{{old ('nome_remetente')}}" type="text" name="nome_remetente" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
              <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nome</label>
              @if($errors->has('nome_remetente'))
                    <span class="text-sm text-rose-600">{{$errors->first('nome_remetente')}}</span>
                @endif
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            

            <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                
                    <label for="comment" class="px-2 sr-only">Detalhes</label>
                    <textarea value = "{{old ('email')}}" id="comment" name="texto" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Descreva o problema" ></textarea>
                    @if($errors->has('texto'))
                            <span class="text-sm text-rose-600">{{$errors->first('texto')}}</span>
                        @endif
            </div>
        </div>
            <div class="w-1/2">
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                <select id="status" name = 'status' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    
                    <option value = "" selected>Selecione o Status</option>
                    <option value="R">Resolvido</option>
                    <option value="P">Pendente</option>
                    <option value="A">Aberto</option>
                </select>
                @if($errors->has('status'))
                     <span class="text-sm text-rose-600">{{$errors->first('status')}}</span>
                @endif
            </div>
            <button type="submit" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Criar Ticket</button>
        </div>
        
    </form>
      {{-- FIM DO FORM PARA CRIAR TICKET --}}
      
    </section>  
</div>
    @livewireScripts
    @wireUiScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
{{-- <option @if(old('categoria')==$ticket->status) {{'selected="selected"'}} @endif value="{{ $ticket->status }}">
   {{ $ticket->status }}
</option> --}}