@php
    $user = auth()->user();
@endphp

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield("page-title") • GeA</title>
        <meta name="description" content="Painel administrativo dos Gamers em Ação do Habblive Hotel.">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet" />

        <!-- Styles -->
        @env("local")
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endenv
        @env(["staging", "production"])
            <link rel="stylesheet" href="{{asset("build/assets/app-13xvER2e.css")}}">
            <script src="{{asset("build/assets/app-BJ-e0X5y.js")}}"></script>
        @endenv
    </head>
    <body class="antialiased min-h-screen flex flex-col">
        <x-header :user="$user"/>

        <div class="flex flex-1">
            <x-sidebar :user="$user" />

            <div class="flex-1 flex flex-col gap-12">
                <main class="w-[calc(100%_-_24px)] max-w-[952px] mx-auto mt-20 flex-1">
                    @yield("page")
                </main>

                <footer class="w-full p-6 gap-6 flex flex-row items-center justify-between bg-gray-800 border-t border-t-white/10">
                    <p class="text-base font-medium text-gray-400">Painel administrativo da GeA Habblive. Todos os direitos reservados.</p>
                    <p class="text-base font-medium text-gray-400">Desenvolvido por Kaio Felipe</p>
                </footer>
            </div>
        </div>

        @stack("floatings")
        @stack("scripts")
    </body>
</html>
