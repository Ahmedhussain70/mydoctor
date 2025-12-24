<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function callGeminiAPI(Request $request)
    {
        $request->validate([
            'user_input' => 'required|string',
            'file' => 'nullable|file|max:10240'
        ]);

        $apiKey = env('GEMINI_API_KEY');
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=$apiKey";

        $chatHistory = session('chat_history', []);

        $chatHistory[] = [
            'role' => 'user',
            'text' => $request->user_input
        ];

        $filePart = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePart = [
                "inlineData" => [
                    "mimeType" => $file->getMimeType(),
                    "data" => base64_encode(file_get_contents($file->getRealPath()))
                ]
            ];
        }

        $contents = [];
        foreach ($chatHistory as $chat) {
            $parts = [
                ["text" => $chat['text']]
            ];

            if ($chat['role'] === 'user' && $filePart) {
                $parts[] = $filePart;
            }

            $contents[] = [
                "role" => $chat['role'],
                "parts" => $parts
            ];
        }

        $response = Http::post($url, [
            "contents" => $contents
        ]);

        $aiResponse = $response->json()['candidates'][0]['content']['parts'][0]['text'] ?? 'No response';

        $chatHistory[] = [
            'role' => 'model',
            'text' => $aiResponse
        ];

        session(['chat_history' => $chatHistory]);

        return response()->json(['ai_response' => $aiResponse]);
    }


    public function clearChat()
    {
        session()->forget('chat_history');
        return response()->json(['message' => 'Chat cleared']);
    }
}
