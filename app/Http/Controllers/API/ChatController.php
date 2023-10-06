<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChatRequest;
use App\Models\Chat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return Chat::all();
    }

    public function show(Chat $chat): Chat
    {
        return $chat;
    }

    public function store(Request $request): JsonResponse
    {
        $chat = Chat::create($request->all());

        return response()->json($chat, 201);
    }

    public function update(Chat $chat, ChatRequest $request ): JsonResponse
    {
        $chat->update($request->all());

        return response()->json($chat, 200);
    }

    public function delete(Chat $chat): JsonResponse
    {
        $chat->delete();

        return response()->json(null, 204);
    }
}
