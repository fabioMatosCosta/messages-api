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
            ->join('users', 'messages.sender_id', '=', 'users.id') //joined the sender info to the message table
            ->select('messages.id as message_id','sender_id', 'recipient_id', 'body', 'email', 'first_name', 'messages.created_at as message_created_at') // select relevant info to display, including the sent date as message_created_at
            ->latest('message_created_at')
            ->get();
        
        return new MessagesResource($messages); //shows all the messages sorted by sent date, with info of the sender
    }

    public function store(Users $user, Request $request)
    {
        $request->validate([                   //validates the form, throws an error if both fields are not filled in
            'recipient_email' => 'required',
            'body'            => 'required'
        ]);

        $recipient_email = $request->recipient_email; // get the email of the recipient from the form

        $recipient = Users::where('email', '=', $recipient_email)->firstOrFail(); //finding the recipient email in the database, if not found throws an error

        $newMessage = $request->all();
        $newMessage['sender_id'] = $user->id; // added te id of the sender form the url parameter
        $newMessage['recipient_id'] = $recipient->id; 
        
        Messages::create($newMessage);

        return response()->json('Message sent', 201);
    }

    public function destroy(Messages $message)
    {
        $message->delete();
        return response()->json('',204);
    }  

}