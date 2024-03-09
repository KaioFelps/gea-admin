@php
use App\View\Components\Types\AccordionLink;
use App\Enums\RoleEnum;

$destaques_links = [
    new AccordionLink ("Ver todos", "/"),
    new AccordionLink ("Adicionar destaque", "/e", [RoleEnum::Gestor]),
];
$destaques_icon = asset("images/submenu-destaque.png");

$membros_links = [
    new AccordionLink ("Adicionar membro", route("user.create"), [RoleEnum::Mestre, RoleEnum::Gestor]),
    new AccordionLink ("Lista de membros", "/c"),
    new AccordionLink ("Gerenciar pontos", "/b", [RoleEnum::Gestor]),
    new AccordionLink ("Checar pontos", "/a"),
];
$membros_icon = asset("images/submenu-membros.png");

@endphp

<aside class="w-96 h-auto bg-gray-700 flex flex-col">
    <x-sidebar-link title="Início" href="{{route('home')}}" icon="{{asset('images/submenu-home.png')}}" />
    
    {{-- <div class="sidebar-separator">
        Blog
    </div> --}}

    {{-- ////////////////////////////// --}}
    
    <div class="sidebar-separator">
        Administração
    </div>
    <x-sidebar-link title="Registros" href="/registros" icon="{{asset('images/submenu-historico.png')}}" />
    <x-sidebar-accordion title="Destaques" :links="$destaques_links" :icon="$destaques_icon" :user-role="$user->role" />
    <x-sidebar-accordion title="Membros" :links="$membros_links" :icon="$membros_icon" :user-role="$user->role" />
</aside>
