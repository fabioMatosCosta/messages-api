<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;
use App\Http\Resources\MessagesResource;
use App\Http\Resources\MessagesResourceCollection;
use App\Users;

class MessagesController extends Controller
{
    public function show(Messages $user): MessagesResourceCollection
    {   
        $messages = Messages::where('recipient_id', $user->id)
            // ->orderBy('created_at', 'desc')
            ->join('users', 'messages.sender_id', '=', 'users.id')
            ->select('sender_id', 'recipient_id', 'body', 'email', 'first_name')
            ->get();
        
        return new MessagesResource($messages);
    }

    public function store(Users $user, Request $request)
    {
        $request->validate([
            'recipient_email' => 'required',
            'body'            => 'required'
        ]);

        $recipient_email = $request->recipient_email;

        $recipient = Users::where('email', '=', $recipient_email)->firstOrFail();

        $newMessage = $request->all();
        $newMessage['sender_id'] = $user->id;
        $newMessage['recipient_id'] = $recipient->id;
        
        $message = Messages::create($newMessage);

        return response()->json('Message sent', 201);
    }
}
