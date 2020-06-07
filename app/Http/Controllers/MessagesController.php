<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;
use App\Http\Resources\MessagesResource;
use App\Http\Resources\MessagesResourceCollection;

class MessagesController extends Controller
{
    public function show(Messages $messages): MessagesResource
    {
        return new MessagesResource($messages);
    }

    public function index(): MessagesResourceCollection
    {
        return new MessagesResourceCollection(Messages::paginate());
    }
}
