<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Users;
use App\Http\Resources\v1\UserResource;
use App\Http\Resources\v1\UserResourceCollection;

class UserController extends Controller
{
    public function show(Users $user): UserResource
    {
        return new UserResource($user); // returns user with useful info in a json format
    }

    public function index(): UserResourceCollection
    {
        return new UserResourceCollection(Users::paginate()); //Used Resource collection to get a paginated list of all users in a json format
    }
}
