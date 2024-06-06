<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $persons = Person::where('es_activo', '1')->get();

        return response()->json(['data'=>$persons], 200);
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
        $person = Person::create([
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
            'es_eliminado' => '0'
        ]);

        return response()->json(['data' => $person], 200);
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
        $person = Person::find($id);
        $person->tipo_persona = $request->tipo_persona;
        $person->tipo_documento = $request->tipo_documento;
        $person->documento_identidad = $request->documento_identidad;
        $person->apellido_paterno = $request->apellido_paterno;
        $person->apellido_materno = $request->apellido_materno;
        $person->nombres = $request->nombres;
        $person->direccion = $request->direccion;
        $person->ubigeo = $request->ubigeo;
        $person->telefono = $request->telefono;
        $person->es_empleado = $request->es_empleado;
        $person->es_proveedor = $request->es_proveedor;
        $person->save();

        return response()->json(['data'=>$person], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $person = Person::find($id);
        $person->es_activo = '0';
        $person->es_eliminado = '1';
        $person->save();

        return response()->json(['data'=>$person], 200);
    }
}
