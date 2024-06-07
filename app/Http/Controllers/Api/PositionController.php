<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $positions = Position::where('es_activo', '1')->with('area')->get();

        return response()->json(['data'=>$positions], 200);
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
        $position = Position::create([
            'area_id' => $request->area_id,
            'cod_cargo' => $request->cod_cargo,
            'nombre_cargo' => $request->nombre_cargo,
            'es_activo' => '1',
            'es_eliminado' => '0'
        ]);

        return response()->json(['data'=>$position], 200);
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
        $position = Position::find($id);
        $position->area_id = $request->area_id;
        $position->cod_cargo = $request->cod_cargo;
        $position->nombre_cargo = $request->nombre_cargo;
        $position->save();

        return response()->json(['data'=>$position], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $position = Position::find($id);
        $position->es_activo = '0';
        $position->es_eliminado = '1';
        $position->save();

        return response()->json(['data'=>$position], 200);
    }

    public function positionsForArea($id){
        $positions = Position::where('area_id', $id)->where('es_activo', '1')->with('area')->get();

        return response()->json(['data'=>$positions], 200);
    }
}
