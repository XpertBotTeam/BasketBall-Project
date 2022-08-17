<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\admin;

class AdminAuthController extends Controller
{

    // public function __construct() {
    //     $this->middleware('auth:admin_api', ['except' => ['login', 'register']]);
    // }

    public function register(Request $request){

        $post_data = $request->validate([
                'name'=>'required|string',
                'email'=>'required|string|email|unique:admins',
                'password'=>'required'
        ]);

            $admin = admin::create([
            'name' => $post_data['name'],
            'email' => $post_data['email'],
            'password' => Hash::make($post_data['password']),
            ]);

            $token = $admin->createToken('authToken');

            return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            ]);
        }



        public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->guard('admin_api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function logout (Request $request)
    {
        auth()->guard('admin_api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }


    // public function refresh()
    // {
    //     return $this->respondWithToken(auth()->refresh());
    // }

    public function adminProfile() {
        return response()->json(auth()->guard('admin_api')->admin());
    }

    // public function me() {
    //     return response()->json(auth()->guard('admin_api')->admin());
    // }


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'success' => true,
        ]);
    }


}