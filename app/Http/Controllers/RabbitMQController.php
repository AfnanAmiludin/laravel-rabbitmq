<?php

namespace App\Http\Controllers;

use App\Services\RabbitMQService;
use Illuminate\Http\Request;

class RabbitMQController extends Controller
{
    protected $rabbitMQService;

    public function __construct(RabbitMQService $rabbitMQService)
    {
        $this->rabbitMQService = $rabbitMQService;
    }

    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $this->rabbitMQService->publishMessage($message, 'default_queue');
        return redirect()->back()->with('status', 'Message sent!');
    }

    public function receiveMessage()
    {
        $messages = [];
        $callback = function ($msg) use (&$messages) {
            $messages[] = $msg->body;
        };
        

        $this->rabbitMQService->consumeMessage('default_queue', $callback);
        
        return view('rabbitmq.receive', compact('messages'));
    }
}
