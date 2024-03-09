@extends('layouts.layout')

@section("page-title")
Adicionar membro
@endsection

@section("page")
<h1 class="page-title mb-6">Adicionar membro</h1>

<div class="card">
    @error("error")
    <span class="alert error mb-2">{{ $message }}</span>
    @enderror

    @if(session("success"))
    <span class="alert success error mb-2">{{ session("success") }}</span>
    @endif
    
    <form action="{{ route("user.store") }}" method="POST">      
        <div>
            <label class="block mb-2">Nickname</label>
            
            @error("nickname")
            <span class="alert error mb-2">{{ $message }}</span>
            @enderror

            <input
                class="text-input mb-3"
                type="text"
                name="nickname"
                placeholder="Sururu"
                value="{{ old("nickname") }}"
            >
        </div>

        <div class="flex flex-col">
            <label class="block mb-2">Senha</label>
            
            @error("password")
            <span class="alert error mb-2">{{ $message }}</span>
            @enderror

            <input
                class="text-input mb-3"
                type="password"
                name="password"
                placeholder="cacaushow123"
                value="{{ old("password") }}"
            >
        </div>
        
        <div class="flex flex-col">
            <label class="block mb-2">Cargo</label>
            
            @error("role")
            <span class="alert error mb-2">{{ $message }}</span>
            @enderror

            <input
                class="text-input mb-3"
                type="text"
                name="role"
                placeholder="programador"
                value="{{ old("role") }}"
            >
        </div>

        <button type="submit" class="btn mt-3">Adicionar</button>

    </form>
</div>

@endsection