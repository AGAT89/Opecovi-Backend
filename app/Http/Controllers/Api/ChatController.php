<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        
        $request->validate([
            'mensaje' => 'required|string',
        ]);

        
        $userMessage = Message::create([
            'mensaje' => $request->mensaje,
        ]);

        
        $responseMessage = $this->generateAutoResponse($request->mensaje);

        
        $autoMessage = Message::create([
            'mensaje' => $responseMessage,
        ]);

        return response()->json([
            'statusCode' => 200,
            'user_message' => $userMessage,
            'auto_response' => [
                'mensaje' => $autoMessage->mensaje
            ]
        ], 200);
    }

    private function generateAutoResponse($userMessage)
    {
     
        $userMessage = strtolower($userMessage);  

        
        if (strpos($userMessage, 'hola') !== false) {
            return '¡Hola! ¿En qué puedo ayudarte?';
        }

        if (strpos($userMessage, 'cómo estás') !== false) {
            return 'Estoy bien, gracias por preguntar. ¿Y tú?';
        }

        if (strpos($userMessage, 'adiós') !== false) {
            return '¡Adiós! Espero verte pronto.';
        }

      
        return 'Lo siento, no entiendo tu mensaje. ¿Puedes reformularlo?';
    }
        public function getMessages()
    {
        $messages = Message::all();

        return response()->json($messages);
    }   
}
