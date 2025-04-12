<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emplados = Sucursal::where('es_activo', '1')->with('empresa')->get();

        return response()->json(['data'=>$emplados], 200);
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
        $sucursal = Sucursal::create([
            'id_sucursal' => $request->id_sucursal,
            'cod_sucursal' => $request->cod_sucursal,
            'nomb_sucursal' => $request->nomb_sucursal,
            'direccion' => $request->direccion,
            'ubigeo' => $request->ubigeo,
            'telefono' => $request->telefono,
            'es_activo' => '1',
            'es_eliminado' => '0',
            'usuario_creacion' => $request->usuario_creacion ?? 'system',
            'usuario_modificacion'=>$request->usuario_modificacion ?? 'system',
            'fecha_creacion' =>now(),
            'fecha_modificacion'=>now(),
        ]);

        return response()->json(['data'=>$sucursal], 200);
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
        $sucursal = Sucursal::find($id);
        $sucursal->cod_sucursal = $request->cod_sucursal;
        $sucursal->nomb_sucursal = $request->nomb_sucursal;
        $sucursal->direccion = $request->direccion;
        $sucursal->ubigeo = $request->ubigeo;
        $sucursal->telefono = $request->telefono;
        $sucursal->es_activo = $request->es_activo;
        $sucursal->es_eliminado = $request->es_eliminado;
        $sucursal->usuario_modificacion = $request->usuario_modificacion;
        $sucursal->fecha_modificacion = $request->fecha_modificacion;
        $sucursal->save();

        return response()->json(['data'=>$sucursal], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $sucursal = Sucursal::find($id);
        $sucursal->es_activo = '0';
        $sucursal->es_eliminado = '1';
        $sucursal->save();

        return response()->json(['data'=>$sucursal], 200);
    }
}
