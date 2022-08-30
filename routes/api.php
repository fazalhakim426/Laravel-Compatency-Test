<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 

Route::apiResource('user',  UserController::class)->only(['index','store']);

