<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(): Collection
    {
        return Message::all();
    }

    public function store(MessageRequest $request): JsonResponse
    {
        $chat = Message::create($request->all());

        return response()->json($chat, 201);
    }

    public function show(Message $message): Message
    {
        return $message;
    }

    public function update(MessageRequest $request, Message $message): JsonResponse
    {
        $message->update($request->all());

        return response()->json($message, 200);
    }

    public function delete(Message $message): JsonResponse
    {
        $message->delete();

        return response()->json(null, 204);
    }
}
