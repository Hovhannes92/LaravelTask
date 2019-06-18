<?php

namespace App\Http\Controllers\Api;

use App\Http\DataProviders\Post\IndexDataProvider;
use App\Http\Requests\LoginRequest;
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
}

