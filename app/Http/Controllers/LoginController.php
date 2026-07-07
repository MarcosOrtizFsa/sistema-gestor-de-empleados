<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required',
            'password' => 'required',
        ]);

        $usuario = Usuario::where('usuario', $request->usuario)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return redirect('/')
                ->with('error', 'Usuario o contraseña incorrectos.');
        }

        session([
            'usuario_id' => $usuario->id,
            'usuario_nombre' => $usuario->nombre,
        ]);

        return redirect()->route('dashboard.index');
    }

    public function logout()
    {
        session()->flush();

        return redirect('/');
    }
}