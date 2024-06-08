<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personas = Persona::where('es_activo', '1')->with('empresa')->get();

        return response()->json(['data'=>$personas], 200);
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
        $persona = Persona::create([
            'id_empresa' => $request->id_empresa,
            'tipo_persona' => $request->tipo_persona,
            'tipo_documento' => $request->tipo_documento,
            'documento_identidad' => $request->documento_identidad,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'nombres' => $request->nombres,
            'direccion' => $request->direccion,
            'ubigeo' => $request->ubigeo,
            'telefono' => $request->telefono,
            'es_empleado' => $request->es_empleado,
            'es_proveedor' => $request->es_proveedor,
            'es_activo' => '1',
            'es_eliminado' => '0',
        ]);

        return response()->json(['data'=>$persona], 200);
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
        $persona = Persona::find($id);
        $persona->id_empresa = $request->id_empresa;
        $persona->tipo_persona = $request->tipo_persona;
        $persona->tipo_documento = $request->tipo_documento;
        $persona->documento_identidad = $request->documento_identidad;
        $persona->apellido_paterno = $request->apellido_paterno;
        $persona->apellido_materno = $request->apellido_materno;
        $persona->nombres = $request->nombres;
        $persona->direccion = $request->direccion;
        $persona->ubigeo = $request->ubigeo;
        $persona->telefono = $request->telefono;
        $persona->es_empleado = $request->es_empleado;
        $persona->es_proveedor = $request->es_proveedor;
        $persona->save();

        return response()->json(['data'=>$persona], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $persona = Persona::find($id);
        $persona->es_activo = '0';
        $persona->es_eliminado = '1';
        $persona->save();

        return response()->json(['data'=>$persona], 200);
    }

    public function buscaPorDocumento(String $documento){
        $persona = Persona::where('documento_identidad', $documento)->first();

        return response()->json(['data'=>$persona],200);
    }
}
