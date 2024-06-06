<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employees = Employee::where('es_activo', '1')->with('person', 'area', 'position')->get();

        return response()->json(['data'=>$employees], 200);
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
        $employee = Employee::create([
            'people_id' => $request->people_id,
            'area_id' => $request->area_id,
            'position_id' => $request->position_id,
            'es_activo' => '1',
            'es_eliminado' => '0'
        ]);

        return response()->json(['data'=>$employee], 200);
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
        $employee = Employee::find($id);
        $employee->people_id = $request->people_id;
        $employee->area_id = $request->area_id;
        $employee->position_id = $request->position_id;
        $employee->save();

        return response()->json(['data'=> $employee], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $employee = Employee::find($id);
        $employee->es_activo = '0';
        $employee->es_eliminado = '1';
        $employee->save();

        return response()->json(['data' => $employee], 200);
    }
}
