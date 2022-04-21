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
       // return $request;
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
            $usuarios->profile_url = '';
            $usuarios->password = $request->password;
        if($usuarios->save())
        {
            $title = 'Listado de usuarios';

            return view('users.index', compact('title', 'users'));
            // return response()->json([
            //     'message' => 'Usuario creado con éxito!'
            // ], 201);
        }
        else
        {
            return response()->json([
                'message' => 'Error al crear el usuario'
            ], 404);
        }

        
    }



    public function trashed()
    {
        $users = User::onlyTrashed()->paginate();

        $title = 'Listado de usuarios en papelera';

        return view('users.index', compact('title', 'users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // public function store(CreateUserRequest $request)
    // {
    //     $request->createUser();

    //     return redirect()->route('users.index');
    // }

    // public function edit(User $user)
    // {
    //     return $this->form('users.edit', $user);
    // }

    // protected function form($view, User $user)
    // {
    //     return view($view, [
    //         'cargos' => Cargo::orderBy('title', 'ASC')->get(),
    //         'skills' => Skill::orderBy('name', 'ASC')->get(),
    //         'roles' => trans('users.roles'),
    //         'user' => $user,
    //     ]);
    // }

    // public function update(UpdateUserRequest $request, User $user)
    // {
    //     $request->updateUser($user);

    //     return redirect()->route('users.show', ['user' => $user]);
    // }

    public function trash(User $user)
    {
        $user->delete();
        $user->profile()->delete();

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::onlyTrashed()->where('id', $id)->firstOrFail();

        $user->forceDelete();

        return redirect()->route('users.trashed');
    }



}
