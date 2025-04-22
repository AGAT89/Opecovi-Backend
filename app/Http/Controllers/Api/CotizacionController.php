<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cotizacion;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $cotizacion = Cotizacion::create([
            'id_cotizacion' => $request->id_cotizacion,
            'id_empresa' => $request->id_empresa,
            'id_sucursal' => $request->id_sucursal,
            'id_solicitud_compra' => $request->id_solicitud_compra,
            'id_proveedor' => $request->id_proveedor,
            'id_empleado' => $request->id_empleado,
            'id_empleado_aprobacion' => $request->id_empleado_aprobacion,
            'nro_cotizacion' => $request->nro_cotizacion,
            'fecha_cotizacion' => now(),
            'fecha_solicitud_compra' => now(),
            'fecha_aprobacion' => $request->fecha_aprobacion,
            'imp_neto' => $request->imp_neto,
            'imp_base_isc' => $request->imp_base_isc,
            'imp_isc' => $request->imp_isc,
            'es_activo' => '1',
            'es_eliminado' => '0',
            'imp_base_igv' => $request->imp_base_igv,
            'imp_igv' => $request->imp_igv,
            'imp_cobrar' => $request->imp_cobrar,
            'usuario_creacion' => $request->usuario_creacion ?? 'system',
            'fecha_creacion' => now(),
            'usuario_modificacion' => $request->usuario_modificacion ?? 'system',
            'fecha_modificacion' => now(),
        ]);
    
        return response()->json(['data' => $cotizacion], 200);
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
    }
}
