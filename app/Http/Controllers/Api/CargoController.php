<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargos = Cargo::where('es_activo', '1')->with('empresa','area')->get();

        return response()->json(['data'=> $cargos], 200);
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
        $cargo = Cargo::create([
            'id_empresa' => $request->id_empresa,
            'id_area' => $request->id_area,
            'cod_cargo' => $request->cod_cargo,
            'nomb_cargo' => $request->nomb_cargo,
            'es_activo' => '1',
            'es_eliminado' => '0'
        ]);

        return response()->json(['data'=>$cargo], 200);
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
        $cargo = Cargo::find($id);
        $cargo->cod_cargo = $request->cod_cargo;
        $cargo->nomb_cargo = $request->nomb_cargo;
        $cargo->save();

        return response()->json(['data' => $cargo], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cargo = Cargo::find($id);
        $cargo->es_activo = "0";
        $cargo->es_eliminado = "1";
        $cargo->save();

        return response()->json(['data'=>$cargo], 200);
    }

    public function buscaCargos($id_area){
        $cargos = Cargo::where('es_activo', '1')->where('id_area', $id_area)->with('empresa','area')->get();

        return response()->json(['data'=> $cargos], 200);
    }
}
