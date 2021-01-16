<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->orderByDesc('created_at')
            ->paginate();

        $title = 'Listado de usuarios';

        return view('users.index', compact('title', 'users'));
    }

    public function form_users(Request $request)
    {

        $title = 'Crear usuarios';

        return view('users.crear_usuarios', compact('title'));
    }

    public function create(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'dni' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);

        $usuarios = new User;
            $usuarios->name = $request->name;
            $usuarios->dni = $request->dni;
            $usuarios->email = $request->email;
            $usuarios->password = $request->password;
        if($usuarios->save())
        {
            return response()->json([
                'message' => 'Usuario creado con éxito!'
            ], 201);
        }
        else
        {
            return response()->json([
                'message' => 'Error al crear el usuario'
            ], 404);
        }

        return view('users.crear_usuarios', compact('title'));
    }



    public function trashed()
    {
        $users = User::onlyTrashed()->paginate();

        $title = 'Listado de usuarios en papelera';

        return view('users.index', compact('title', 'users'));
    }



}
