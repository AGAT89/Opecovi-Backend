<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emplados = Empleado::where('es_activo', '1')->with('empresa', 'persona', 'area', 'cargo')->get();

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
        $empleado = Empleado::create([
            'id_empresa' => $request->id_empresa,
            'id_persona' => $request->id_persona,
            'id_area' => $request->id_area,
            'id_cargo' => $request->id_cargo,
            'es_activo' => '1',
            'es_eliminado' => '0',
            'usuario_creacion' => $request->usuario_creacion ?? 'system',
            'usuario_modificacion'=>$request->usuario_modificacion ?? 'system',
            'fecha_creacion' =>now(),
            'fecha_modificacion'=>now(),
        ]);

        return response()->json(['data'=>$empleado], 200);
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
        $empleado = Empleado::find($id);
        $empleado->id_empresa = $request->id_empresa;
        $empleado->id_persona = $request->id_persona;
        $empleado->id_area = $request->id_area;
        $empleado->id_cargo = $request->id_cargo;
        $empleado->save();

        return response()->json(['data'=>$empleado], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $empleado = Empleado::find($id);
        $empleado->es_activo = '0';
        $empleado->es_eliminado = '1';
        $empleado->save();

        return response()->json(['data'=>$empleado], 200);
    }
}
