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
        
        // return response()->json($messages, 200);
        return new MessagesResource($messages);
    }

    public function index(Messages $user)
    {

    }
}
