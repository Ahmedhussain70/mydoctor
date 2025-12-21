<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function callGeminiAPI(Request $request)
    {
        $request->validate(['user_input' => 'required|string']);

        $apiKey = env('GEMINI_API_KEY');
        // $apiKey = 'AIzaSyCeJcVRNZ1AG3e6DExTHAUYrCieqTdFI9o';
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=$apiKey";

        // Retrieve chat history from session
        $chatHistory = session('chat_history', []);

        // Add user input to chat history
        $chatHistory[] = ['role' => 'user', 'text' => $request->user_input];

        // Prepare payload for API
        $payload = [
            "contents" => array_map(function ($chat) {
                return [
                    "role" => $chat['role'],
                    "parts" => [["text" => $chat['text']]]
                ];
            }, $chatHistory)
        ];

        // API Call
        $response = Http::withHeaders(['Content-Type' => 'application/json'])
            ->post($url, $payload);

        $aiResponse = $response->json()['candidates'][0]['content']['parts'][0]['text'] ?? 'No response';

        // Add AI response to chat history
        $chatHistory[] = ['role' => 'model', 'text' => $aiResponse];

        // Store updated chat history in session
        session(['chat_history' => $chatHistory]);

        return response()->json(['ai_response' => $aiResponse]);
    }

    public function clearChat()
    {
        session()->forget('chat_history');
        return response()->json(['message' => 'Chat cleared']);
    }
}
