<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;
use App\Http\Resources\MessagesResource;
use App\Http\Resources\MessagesResourceCollection;
use App\Users;

class MessagesController extends Controller
{
    public function show(Messages $user)
    {   
        $messages = Messages::where('recipient_id', $user->id)
            ->join('users', 'messages.sender_id', '=', 'users.id')
            ->get();
        
        // return response()->json($messages, 200); maybe show the messages in chronological order/dont need to include update route
        // make an api version 1, for future updates
        return new MessagesResource($messages);
    }

    public function store(Users $user, Request $request)
    {
        $request->validate([
            'recipient_email' => 'required',
            'body'            => 'required'
        ]);

        $newMessage = $request->all();
        $newMessage['sender_id'] = $user->id;
        
        dd($newMessage);

        // $message = Messages::create($newMessage);

        // return response()->json('Message sent', 201);
    }
}
