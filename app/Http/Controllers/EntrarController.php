<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{
    public function form()
    {
        return view('entrar.form');
    }

    public function entrar(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return 'erro ao entrar';
        }

        return redirect()->route('listar_series');
    }
}
