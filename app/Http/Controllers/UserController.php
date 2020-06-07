<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceCollection;

class UserController extends Controller
{
    public function show(Users $user): UserResource
    {
        return new UserResource($user);
    }

    public function index(): UserResourceCollection
    {
        return new UserResourceCollection(Users::paginate());
    }
}
