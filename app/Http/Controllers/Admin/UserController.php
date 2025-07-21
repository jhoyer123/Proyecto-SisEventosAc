<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Administrador;
use App\Models\Control;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index');
    }

    public function listarAdministradores()
    {
        $usuarios = Administrador::with('user')->get();

        return view('admin.users.index', compact('usuarios'));
    }

    public function listarControles()
    {
        $usuarios = Control::with('user')->get();

        return view('admin.users.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        //return response()->json(request()->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'rol' => 'required|in:administrador,control', // Validas los roles permitidos
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Asignas el rol dinámicamente
        $user->assignRole($request->rol);

        // 👇 Aquí se crea en la tabla correspondiente según el rol
        if ($request->rol === 'administrador') {
            Administrador::create([
                'id_administrador' => $user->id, // Heredas el id del user
                // Puedes agregar otros campos si tu tabla administrador los tiene
            ]);
        }

        if ($request->rol === 'control') {
            Control::create([
                'id_control' => $user->id, // Heredas el id del user
                // Otros campos si es necesario
            ]);
        }

        return redirect()->route('users.index')
            ->with('mensaje', 'Usuario creado exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //return view('admin.expositores.create');
        //echo "$id";
        $usuario = User::findOrFail($id);
        //return response()->json($expositor);
        return view('admin.users.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
