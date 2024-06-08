<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::where('es_activo', '1')->with('empresa', 'persona')->get();

        return response()->json(['data'=>$proveedores],200);
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
        $proveedor = Proveedor::create([
            'id_empresa' => $request->id_empresa,
            'id_persona' => $request->id_persona,
            'giro_negocio' => $request->giro_negocio,
            'es_activo' => '1',
            'es_eliminado' => '0',
        ]);

        return response()->json(['data'=>$proveedor], 200);
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
        $proveedor = Proveedor::find($id);
        $proveedor->id_empresa = $request->id_empresa;
        $proveedor->id_persona = $request->id_persona;
        $proveedor->giro_negocio = $request->giro_negocio;
        $proveedor->save();

        return response()->json(['data'=>$proveedor], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $proveedor = Proveedor::find($id);
        $proveedor->es_activo = '0';
        $proveedor->es_eliminado = '1';
        $proveedor->save();

        return response()->json(['data'=>$proveedor], 200);
    }
}
