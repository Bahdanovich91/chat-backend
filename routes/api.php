<?php

use App\Http\Controllers\API\ChatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('chats', [ChatController::class, 'index']);
Route::get('chats/{chat}', [ChatController::class, 'show']);
Route::post('chats', [ChatController::class, 'store']);
Route::put('chats/{chat}', [ChatController::class, 'update']);
Route::delete('chats/{chat}', [ChatController::class, 'delete']);
