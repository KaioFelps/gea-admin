<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="fixed inset-0 flex flex-col items-center justify-center">            
            @yield("page")

            <footer class="max-w-96 mx-auto w-[calc(100%_-_24px)] mt-12">
                <p class="text-white/70 font-medium text-sm text-center">GeA Habblive © 2024 Todos os direitos reservados.Desenvolvido por <a href="https://github.com/KaioFelps" target="_blank" class="text-blue-500 font-bold">Kaio Felipe</a>.</p>
            </footer>
        </div>
    </body>
</html>
