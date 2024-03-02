<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function login() {
        return view ("login");
    }

    public function store(Request $request) {
        $request->validate([
            "nickname" => "bail|required|string",
            "password" => "required|min:5"
        ], [
            "nickname.required" => "Digite seu nickname para logar.",
            "nickname.string" => "Digite um nickname válido.",
            "password.required" => "Digite sua senha para logar.",
            "password.min" => "A senha deve ser maior que :min."
        ]);
    }
}
