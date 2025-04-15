<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Modulo;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modulos = Modulo::where('es_activo', '1')->with('empresa')->get();

        return response()->json(['data'=>$modulos], 200);
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
        $modulo = Modulo::create([
            'id_empresa' => $request->id_empresa,
            'cod_modulo' => $request->cod_modulo,
            'nomb_modulo' => $request->nomb_modulo,
            'es_activo' => '1',
            'es_eliminado' => '0'
        ]);

        return response()->json(['data'=>$modulo]);
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
        $modulo = Modulo::find($id);
        $modulo->cod_modulo = $request->cod_modulo;
        $modulo->nomb_modulo = $request->nomb_modulo;
        $modulo->save();

        return response()->json(['data'=>$modulo], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $modulo = Modulo::find($id);
        $modulo->es_activo = '0';
        $modulo->es_eliminado = '1';
        $modulo->save();

        return response()->json(['data'=>$modulo], 200);
    }
}
