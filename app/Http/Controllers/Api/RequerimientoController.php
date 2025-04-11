<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Requerimiento;
use App\Models\RequerimientoDetalle;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RequerimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requerimientos = Requerimiento::where('es_activo', '1')->with('empresa', 'sucursal', 'empleado.persona', 'requerimientosDetalle')->get();

        return response()->json(['data'=>$requerimientos],200);
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
        // $detalle = json_decode($request->detalle, true);

        // return response()->json($request->detalle);
        $requerimiento = Requerimiento::create([
            'id_empresa' => $request->id_empresa,
            'id_sucursal' => $request->id_sucursal,
            'id_empleado' => $request->id_empleado,
            'id_empleado_aprobador' => $request->id_empleado_aprobador,
            'nro_requerimiento' => $request->nro_requerimiento,
            'fecha_emision' => Carbon::now()->toDateTimeString(),
            'fecha_creacion' => Carbon::now()->toDateTimeString(),
            'es_activo' => '1',
            'es_eliminado' => '0',
        ]);

        foreach ($request->detalle as $key => $value) {
            RequerimientoDetalle::create([
                'id_empresa' => $request->id_empresa,
                'id_requerimiento' => $requerimiento->id_requerimiento,
                'id_articulo' => $value['id_articulo'],
                'cant_solicitada' => $value['cant_solicitada'],
                'cant_atendida' => 0,
            ]);
        }


        return response()->json(['data'=>$requerimiento],200);
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $requerimiento = Requerimiento::find($id);
        $requerimiento->es_activo = '0';
        $requerimiento->es_eliminado = '1';
        $requerimiento->save();

        return response()->json(['data'=>$requerimiento],200);
    }

    public function buscarRequerimiento($id) {

        $requerimiento = Requerimiento::with('empresa', 'sucursal', 'empleado.persona', 'requerimientosDetalle.articulo')->find($id);

        return response()->json(['data'=>$requerimiento],200);
    }
}
