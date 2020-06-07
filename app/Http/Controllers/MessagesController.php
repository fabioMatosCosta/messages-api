<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;
use App\Http\Resources\MessagesResource;

class MessagesController extends Controller
{
    public function show(Messages $messages): MessagesResource
    {
        return new MessagesResource($messages);
    }
}
