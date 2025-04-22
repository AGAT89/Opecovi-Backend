<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Message;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'mensaje' => 'required|string',
            'id_usuario' => 'nullable|integer',
        ]);

        $userMessage = Message::create([
            'mensaje' => $request->mensaje,
            'id_usuario' => $request->id_usuario,
        ]);

        $responseMessage = $this->generateAutoResponse($request->mensaje);

        $autoMessage = Message::create([
            'mensaje' => $responseMessage,
            'id_usuario' => $request->id_usuario,
        ]);

        return response()->json([
            'statusCode' => 200,
            'user_message' => $userMessage,
            'auto_response' => [
                'mensaje' => $autoMessage->mensaje,
            ],
        ], 200);
    }

    public function deleteUserMessages(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|integer',
        ]);

        Message::where('id_usuario', $request->id_usuario)->delete();

        return response()->json([
            'statusCode' => 200,
            'message' => 'Mensajes eliminados',
        ]);
    }

    public function getMessages(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|integer',
        ]);

        $messages = Message::where('id_usuario', $request->id_usuario)->get();

        if ($messages->isEmpty()) {
            $init = Message::create([
                'mensaje' => 'Hola, ¿qué producto desea buscar?',
                'id_usuario' => $request->id_usuario,
            ]);
            $messages = collect([$init]);
        }

        return response()->json([
            'statusCode' => 200,
            'data' => $messages,
        ]);
    }


    private function generateAutoResponse($userMessage)
    {
        $userMessage = strtolower($userMessage);

        if (strpos($userMessage, 'hola') !== false) {
            return '¡Hola! ¿Qué producto desea buscar? Puedes consultar varios separados por comas o "y".';
        }

        $productos = preg_replace('/\s*y\s*|,/', '|', $userMessage);
        $palabrasClave = array_filter(array_map('trim', explode('|', $productos)));

        $respuesta = [];

        foreach ($palabrasClave as $palabra) {
            $articulos = Articulo::where('es_activo', 1)
                ->where('nomb_articulo', 'like', "%$palabra%")
                ->get();

            if ($articulos->isEmpty()) {
                $respuesta[] = "No se encontró stock para \"$palabra\".";
            } else {
                foreach ($articulos as $articulo) {
                    $respuesta[] = "{$articulo->nomb_articulo}: {$articulo->stock} en stock.";
                }
            }
        }

        return implode("\n", $respuesta);
    }
}
