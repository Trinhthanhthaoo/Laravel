<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'Login' => 'required|string|unique:nguoidung,email|unique:nguoidung,TenDangNhap',
            'MatKhau' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Determine if the login is an email or username
        $login = $request->input('Login');

        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $user = User::create([
                'Email' => $login,
                'MatKhau' => Hash::make($request->input('MatKhau')),
            ]);
        } else {
            $user = User::create([
                'TenDangNhap' => $login,
                'MatKhau' => Hash::make($request->input('MatKhau')),
            ]);
        }

        // Generate JWT token for the user
        $token = JWTAuth::fromUser($user);

        // Return the token and user data as a response
        return response()->json([
            'token' => $token,
            'user' => $user,
        ], 201);
    }

    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'Login' => 'required|string',
            'MatKhau' => 'required|string',
        ]);

        $credentials = $request->only('Login', 'MatKhau');

        $user = null;

        try {
            // Check if the input is an email or username
            if (filter_var($credentials['Login'], FILTER_VALIDATE_EMAIL)) {
                // Authenticate by email
                $user = User::where('Email', $credentials['Login'])->first();
            } else {
                // Authenticate by username
                $user = User::where('TenDangNhap', $credentials['Login'])->first();
            }

            if (!$user) {
                return response()->json(['error' => 'Unauthorized - User not found'], 401);
            }

            // Attempt to authenticate the user
            if (!Hash::check($credentials['MatKhau'], $user->MatKhau)) {
                return response()->json(['error' => 'Unauthorized - Password mismatch'], 401);
            }

            // Generate JWT token for the user
            $token = JWTAuth::fromUser($user);

            // Return the token as a response
            return $this->respondWithToken($token);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(JWTAuth::refresh(JWTAuth::getToken()));
    }

    public function userProfile()
    {
        return response()->json(JWTAuth::user());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }
    public function user(Request $request)
    {
       
        return response()->json(Auth::user());
    }
}
