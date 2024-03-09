<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("user");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("create", User::class);
        return view("membro_novo");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->user()->cannot("create", User::class)) {
            return back()->withErrors(["error" => "Você não tem permissão para criar um novo usuário."]);
        }

        $roles = [RoleEnum::Gestor, RoleEnum::Staff, RoleEnum::Mestre, RoleEnum::Arquiteto, RoleEnum::PixelArtista, RoleEnum::Programador];
        $roles_joined = join(",", $roles);
        $roles_joined_with_space = join(", ", $roles);

        $request->validate([
            "nickname" => "required|regex:/^[a-zA-Z0-9\-_:@\.?]+$/",
            "password" => "required|min:5",
            "role" => "required|in:$roles_joined"
        ], [
            "nickname.required" => "Nickname é um campo obrigatório.",
            "nickname.regex" => "O nome do usuário só pode conter de letras sem acentuações, números e os símbolos '-', '_', '?', ':', '.', '@'.",
            "password.required" => "Senha é um campo obrigatório.",
            "password.min" => "A senha deve ter no mínimo :min caracteres.",
            "role.required" => "Cargo é um campo obrigatório.",
            "role.in" => "O cargo deve ser um dos listados: $roles_joined_with_space.",
        ]);

        $user = User::firstWhere("nickname", $request->input("nickname"));

        if ($user) {
            return redirect()->route("user.create")->withErrors(["error" => "Usuário com nickname '$user->nickname' já existe."]);
        }

        $credencials = $request->only("nickname", "password", "role");

        $credencials["role"] = RoleEnum::from_string($credencials["role"]);

        $hasher = new BcryptHasher([]);
        $credencials["password"] = $hasher->make($credencials["password"]);

        $user = User::create($credencials);

        return redirect()->route("user.create")->with(["success" => "Usuário " . $credencials["nickname"] . " criado com sucesso!"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
