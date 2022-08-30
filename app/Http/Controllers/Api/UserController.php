<?php

namespace App\Http\Controllers\Api;

use App\Events\UserCreatedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    
    public function index()
    {
        return response()->json(['user'=> UserResource::collection(User::all())]);
    
    
    }
    public function store(UserRequest $userRequest)
    {
    //   $user =   User::create($userRequest->all());
      $user =   User::create([
        'email' => $userRequest->email,
        'name' => $userRequest->name,
      ]);

      event(new UserCreatedEvent($user));

 
         return response()->json([
            'message' => 'User created successfully!',
            'user' => new UserResource($user)
        ]);
        
    }
}
