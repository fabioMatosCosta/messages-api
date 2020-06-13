<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Messages;
use App\Http\Resources\v1\MessagesResource;
use App\Models\Users;

class MessagesController extends Controller
{
    public function show(Messages $user)
    {   
        $messages = Messages::where('recipient_id', $user->id)
            ->join('users', 'messages.sender_id', '=', 'users.id')
            ->select('sender_id', 'recipient_id', 'body', 'email', 'first_name', 'messages.created_at as message_created_at')
            ->latest('message_created_at')
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
        
        Messages::create($newMessage);

        return response()->json('Message sent', 201);
    }
}