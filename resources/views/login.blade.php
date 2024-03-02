@extends('layouts.unlogged_layout')
@section("page")
    <main class="max-w-96 mx-auto w-[calc(100%_-_24px)] flex flex-col items-center">
        <h1 class="sr-only">Faça login no painel administrativo da GeA (Gamers em Ação) Habblive</h1>

        <img src="{{ asset("images/simbolo_gea.png") }}" width="148px" alt="chapéu de arquiteto em ouro" class="mb-12 pixelated">

        <div class="w-full">
            <p class="text-sm text-white mb-2 font-medium text-center">Painel administrativo GeA Habblive</p>

            <form action="" class="card">
                @csrf
                <label class="block mb-2">
                    <span class="sr-only">Nickname</span>
                    <input type="text" class="text-input" placeholder="Nickname">
                </label>
                <label class="block mb-4">
                    <span class="sr-only">Senha</span>
                    <input type="password" class="text-input" placeholder="Senha">
                </label>

                <button type="submit" class="btn w-full">Entrar</button>
            </form>
        </div>
    </main>
@endsection