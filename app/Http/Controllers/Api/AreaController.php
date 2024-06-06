<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $areas = Area::where('es_activo', '1')->get();

        return response()->json(['data' => $areas], 200);
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
        $area = Area::create([
            'cod_area' => $request->cod_area,
            'nombre_area' => $request->nombre_area,
            'centro_costos' => $request->centro_costos,
            'es_activo' => '1',
            'es_eliminado' => '0'
        ]);

        return response()->json(['data'=>$area], 200);
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
        $area = Area::find($id);
        $area->cod_area = $request->cod_area;
        $area->nombre_area = $request->nombre_area;
        $area->centro_costos = $request->centro_costos;
        $area->save();

        return response()->json(['data'=>$area], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $area = Area::find($id);
        $area->es_activo = '0';
        $area->es_eliminado = '1';
        $area->save();

        return response()->json(['data'=>$area], 200);
    }
}
