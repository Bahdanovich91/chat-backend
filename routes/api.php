<?php

use App\Http\Controllers\API\ChatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('chats', [ChatController::class, 'index'])->name('chat.index');
Route::get('chats/{chat}', [ChatController::class, 'show'])->name('chat.show');
Route::post('chats', [ChatController::class, 'store'])->name('chat.store');
Route::put('chats/{chat}', [ChatController::class, 'update'])->name('chat.update');
Route::delete('chats/{chat}', [ChatController::class, 'delete'])->name('chat.delete');

Route::get('messages', [ChatController::class, 'index'])->name('message.index');
Route::get('messages/{message}', [ChatController::class, 'show'])->name('message.show');
Route::post('messages', [ChatController::class, 'store'])->name('message.store');
Route::put('messages/{message}', [ChatController::class, 'update'])->name('message.update');
Route::delete('messages/{message}', [ChatController::class, 'delete'])->name('message.delete');
