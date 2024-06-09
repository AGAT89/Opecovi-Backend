<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Rol::where('es_activo', '1')->with('empresa','permisos.modulo')->get();

        return response()->json(['data'=>$roles], 200);
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
        $rol = Rol::create([
            'id_empresa' => $request->id_empresa,
            'nomb_rol' => $request->nomb_rol,
            'es_activo' => '1',
            'es_eliminado' => '0',
        ]);

        return response()->json(['data'=>$rol], 200);
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
        //
        $rol = Rol::find($id);
        $rol->id_empresa = $request->id_empresa;
        $rol->nomb_rol = $request->nomb_rol;
        $rol->save();

        return response()->json(['data'=>$rol], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $rol = Rol::find($id);
        $rol->es_activo = '0';
        $rol->es_eliminado = '1';
        $rol->save();

        return response()->json(['data'=>$rol],200);
    }
}
