<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function show(Users $user): UserResource
    {
        return new UserResource($user);
    }
}
