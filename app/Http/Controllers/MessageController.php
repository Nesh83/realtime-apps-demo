<?php

namespace App\Http\Controllers;

use App\Events\NewMessageEvent;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function getPublicMessages()
    {
        $messages = Message::with('sender')->limit(30)->orderByDesc('created_at')->get();

        return $messages;
    }

    public function storePublicMessage(Request $request)
    {
        $this->validate($request, [
            'text' => 'required'
        ]);

        $user = Auth::user();

        $message = Message::create([
            'text' => $request->text,
            'sender_id' => $user->id,
        ]);


        NewMessageEvent::dispatch($message);

        return $message;

    }
    
}
