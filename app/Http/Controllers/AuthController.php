<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(LoginFormRequest $request): JsonResponse
    {
        $validated = $request->validated();

        if (!auth()->attempt($validated)) {
            return $this->error('Credentials not match', 401);
        }

        return $this->success([
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('API Token of ' . auth()->user()->name)->plainTextToken
        ], 'Login successfully');

    }

    public function register(RegisterFormRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken
        ], 'User created successfully', 201);
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
        return $this->success([], 'Logout successfully');
    }
}
