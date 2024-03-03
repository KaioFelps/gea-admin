<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function login() {
        return view("login");
    }

    public function store(Request $request) {
        $request->validate([
            "nickname" => "bail|required|string",
            "password" => "required|min:5"
        ], [
            "nickname.required" => "Digite seu nickname para logar.",
            "nickname.string" => "Digite um nickname válido.",
            "password.required" => "Digite sua senha para logar.",
            "password.min" => "A senha deve ser maior que :min caracteres."
        ]);

        $credentials = $request->only("nickname", "password");

        $user = User::firstWhere("nickname", $credentials["nickname"]);

        if (!$user) {
            return redirect()->route("session.login")->withErrors(["error" => "Nickname ou senha incorreto(s)."]);
        }

        $password_matches = password_verify($credentials["password"], $user->password);
        
        if (!$password_matches) {
            return redirect()->route("session.login")->withErrors(["error" => "Nickname ou senha incorreto(s)."]);
        }

        if ($user->active == false) {
            return redirect()->route("user.create")->withErrors(["error" => "Usuário com nickname já existe."]);
        }

        Auth::login($user, true);
        return redirect()->route("home");
    }

    public function destroy() {
        Auth::logout();
        return redirect()->route("session.login");
    }
}
