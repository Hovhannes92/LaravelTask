<?php

namespace App\Http\Controllers\Api;

use App\Http\DataProviders\Post\IndexDataProvider;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request, IndexDataProvider $dataProvider)
    {

        $request->loginAttempt();

        return response()->json(Auth::user());

    }

    public function register(RegisterRequest $request, User $user)
    {
        return response()->json($request->registerStore()->getUser());
    }
}

