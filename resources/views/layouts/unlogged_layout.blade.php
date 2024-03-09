<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GeA Admin • Login</title>

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
    <body class="antialiased">
        <div class="fixed inset-0 flex flex-col items-center justify-center">            
            @yield("page")

            <footer class="max-w-96 mx-auto w-[calc(100%_-_24px)] mt-12">
                <p class="text-white/70 font-medium text-sm text-center">GeA Habblive © 2024 Todos os direitos reservados.Desenvolvido por <a href="https://github.com/KaioFelps" target="_blank" class="text-blue-500 font-bold">Kaio Felipe</a>.</p>
            </footer>
        </div>

        @stack("scripts")
    </body>
</html>
