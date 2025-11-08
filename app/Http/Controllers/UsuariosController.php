<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuariosController
{
    // Listar todos los usuarios
    public function index()
    {
        $usuarios = Usuarios::all();
        return response()->json($usuarios);
    }

    // Crear un nuevo usuario
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'email' => 'required|string|max:255|email|unique:usuarios,email',
            'password' => 'required|string|min:6|max:255',
            'roles' => 'required|array',
            'roles.*' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = $validator->validated();
        // Hashear la contraseña antes de guardar
        $data['password'] = bcrypt($data['password']);

        $usuario = Usuarios::create($data);
        return response()->json($usuario, 201);
    }

    // Mostrar un usuario específico
    public function show(string $id)
    {
        $usuario = Usuarios::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($usuario);
    }

    // Actualizar un usuario
    public function update(Request $request, string $id)
    {
        $usuario = Usuarios::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'string',
            'email' => 'string|max:255|email|unique:usuarios,email,' . $id,
            'password' => 'string|min:6|max:255',
            'roles' => 'array',
            'roles.*' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = $validator->validated();
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $usuario->update($data);
        return response()->json($usuario);
    }

    // Eliminar un usuario
    public function destroy(string $id)
    {
        $usuario = Usuarios::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();
        return response()->json(['message' => 'Usuario eliminado con éxito']);
    }
}
