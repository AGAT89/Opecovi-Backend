<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permisos = Permiso::where('es_activo', '1')->with('empresa', 'rol', 'modulo')->get();

        return response()->json(['data'=>$permisos], 200);
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
        $permiso = Permiso::create([
            'id_rol' => $request->id_rol,
            'id_modulo' => $request->id_modulo,
            'id_empresa' => $request->id_empresa,
            'es_activo' => '1',
            'es_eliminado' => '0',
        ]);

        return response()->json(['data'=>$permiso],200);
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
        $permiso = Permiso::find($id);
        $permiso->id_rol = $request->id_rol;
        $permiso->id_modulo = $request->id_modulo;
        $permiso->id_empresa = $request->id_empresa;
        $permiso->save();

        return response()->json(['data'=>$permiso],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permiso = Permiso::find($id);
        $permiso->es_activo = '0';
        $permiso->es_eliminado = '1';
        $permiso->save();

        return response()->json(['data'=>$permiso],200);
    }
}
