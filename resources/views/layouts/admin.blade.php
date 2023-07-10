<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    @livewireStyles

</head>

<body>
    <header>
        <x-sidebar/>
    </header>
    <main class="flex flex-row space-y-4">
        <x-sidebar-admin/>
        <section class="container mx-auto bg-blue-400 h-screen">
           <div class="mx-auto items-center justify-center bg-blue-700 text-center">

                @yield('conteudo')
                {{-- @include('tickets.admin.tarefas')
                @include('tickets.admin.produtividade')
                @include('tickets.admin.usuarios')
                @include('tickets.admin.equipe') --}}

           </div>
        </section>
        
    </main>    
    

    @livewireScripts
    @wireUiScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>