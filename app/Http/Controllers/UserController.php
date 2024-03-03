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
        return view("user");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $roles = [RoleEnum::Gestor, RoleEnum::Staff, RoleEnum::Mestre, RoleEnum::Arquiteto, RoleEnum::PixelArtista, RoleEnum::Programador];
        $roles = join(",", $roles);

        $request->validate([
            "nickname" => "required|regex:/^[a-zA-Z0-9\-_:@?]+$/",
            "password" => "required|min:5",
            "role" => "required|in:$roles"
        ], [
            "nickname.required" => "Nickname é um campo obrigatório.",
            "nickname.regex" => "O nome do usuário só pode conter de letras sem acentuações, números e os símbolos -, _, ?, :. (:regex)",
            "password.required" => "Senha é um campo obrigatório.",
            "password.min" => "A senha deve ter no mínimo :min caracteres.",
            "role.required" => "Cargo é um campo obrigatório.",
            "role.in" => "O cargo deve ser um dos listados: $roles.",
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

        return redirect()->route("user.create")->isSuccessful(true);
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
