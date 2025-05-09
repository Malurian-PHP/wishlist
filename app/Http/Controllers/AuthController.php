<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('sanctum_token')->plainTextToken;

        return $this->sendResponse([
            'user' => $user,
            'token' => $token,
        ], 'User registered successfully.');
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return $this->sendError('Unauthorized', ['error' => 'User does not exist, check the email and try again.'], 401);
        }

        if ($user->email_verified_at === null) {
            return $this->sendError('Unauthorized', ['error' => 'Please verify your email.'], 422);
        }

        if (!Hash::check($request->password, $user->password)) {
            return $this->sendError('Unauthorized', ['error' => 'Password mismatch.'], 401);
        }

        $token = $user->createToken('sanctum_token')->plainTextToken;

        return $this->sendResponse([
            'user' => $user,
            'token' => $token,
        ], 'User registered successfully.');
    }
}
