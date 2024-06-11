<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $usuarios = User::where('es_activo','1')->with('empresa', 'empleado.persona', 'rol.permisos.modulo')->get();

        return response()->json(['data'=>$usuarios],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $usuario = User::create([
            'id_empresa' => $request->id_empresa,
            'id_empleado' => $request->id_empleado,
            'usuario' => $request->usuario,
            'contrasena' => $request->contrasena,
            'es_activo' => '1',
            'es_eliminado' => '0',
            'id_rol' => $request->id_rol
        ]);

        return response()->json(['data'=>$usuario],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $usuario = User::find($id);
        $usuario->id_empleado = $request->id_empleado;
        $usuario->id_rol = $request->id_rol;
        $usuario->usuario = $request->usuario;
        $usuario->contrasena = $request->contrasena;
        $usuario->save();

        return response()->json(['data'=>$usuario],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $usuario = User::find($id);
        $usuario->es_activo = '0';
        $usuario->es_eliminado = '1';
        $usuario->save();

        return response()->json(['data'=>$usuario],200);
    }
}
