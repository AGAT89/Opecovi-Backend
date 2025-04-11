<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articulos = Articulo::where('es_activo', '1')->with('empresa', 'almacen', 'movimientos')->get();

        return response()->json(['data'=>$articulos],200);
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
        $articulo = Articulo::create([
            'id_empresa' => $request->id_empresa,
            'cod_articulo' => $request->cod_articulo,
            'nomb_articulo' => $request->nomb_articulo,
            'unidad_medida' => $request->unidad_medida,
            'contenido_articulo' => $request->contenido_articulo,
            'peso_articulo' => $request->peso_articulo,
            'volumen_articulo' => $request->volumen_articulo,
            'stock_minimo' => $request->stock_minimo,
            'stock_maximo' => $request->stock_maximo,
            'tipo_articulo' => $request->tipo_articulo,
            'cod_barra_articulo' => $request->cod_barra_articulo,
            'es_activo' => '1',
            'es_eliminado' => '0',
            'usuario_creacion' => $request->usuario_creacion ?? 'system',
            'usuario_modificacion'=>$request->usuario_modificacion ?? 'system',
            'fecha_creacion' =>now(),
            'fecha_modificacion'=>now(),
        ]);

        return response()->json(['data'=>$articulo],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $articulo = Articulo::with('empresa', 'almacen', 'movimientos')->find($id);

        return response()->json(['data'=>$articulo], 200);
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
        $articulo = Articulo::find($id);
    
        if (!$articulo) {
            return response()->json(['error' => 'Artículo no encontrado'], 404);
        }
    
        $articulo->id_empresa = $request->id_empresa;
        $articulo->cod_articulo = $request->cod_articulo;
        $articulo->nomb_articulo = $request->nomb_articulo;
        $articulo->unidad_medida = $request->unidad_medida;
        $articulo->contenido_articulo = $request->contenido_articulo;
        $articulo->peso_articulo = $request->peso_articulo;
        $articulo->volumen_articulo = $request->volumen_articulo;
        $articulo->stock_minimo = $request->stock_minimo;
        $articulo->stock_maximo = $request->stock_maximo;
        $articulo->tipo_articulo = $request->tipo_articulo;
        $articulo->cod_barra_articulo = $request->cod_barra_articulo;
        $articulo->save();
    
        return response()->json(['data'=>$articulo],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $articulo = Articulo::find($id);
        $articulo->es_activo = '0';
        $articulo->es_eliminado = '1';
        $articulo->save();

        return response()->json(['data'=>$articulo],200);
    }
}
