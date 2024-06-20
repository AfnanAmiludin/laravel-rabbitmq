<?php

use App\Http\Controllers\RabbitMQController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/send-message', function () {
    return view('rabbitmq.send');
});
Route::post('/send-message', [RabbitMQController::class, 'sendMessage']);
Route::get('/receive-message', [RabbitMQController::class, 'receiveMessage']);