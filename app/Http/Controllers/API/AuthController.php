<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = User::where('email', $request->email)->firstOrFail();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json(['status' => true, 'message' => 'Successfully logged in', 'token' => $token], 200);
        } else {
            return response()->json(['status' => false, 'error' => 'Unauthorized'], 401);
        }
    }

    public function register(AuthRegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  Hash::make($request->password),
        ]);

        return response()->json(['status' => true, 'message' => 'User successfully created'], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['status' => true, 'message' => 'Successfully logged out'], 200);
    }
}
