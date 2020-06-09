<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;
use App\Http\Resources\MessagesResource;
use App\Http\Resources\MessagesResourceCollection;

class MessagesController extends Controller
{
    public function show($user)
    {   
        $messages = Messages::where('recipient_id', $user)
            ->join('users', 'messages.sender_id', '=', 'users.id')
            ->get();

        return response()->json($messages, 200);
    }

    public function index(Messages $user): MessagesResource
    {
        // return new MessagesResourceCollection(Messages::paginate());
        // return new MessagesResource::find($user->recipient_id);
    }
}
