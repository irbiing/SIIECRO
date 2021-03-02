<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function edit()
    {
        $usuario = User::find(Auth::User()->id);
        return view('perfil.edit')->with('usuario', $usuario);
    }
}
