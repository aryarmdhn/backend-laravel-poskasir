<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        // check
        $user = User::where('email', $request->email)->first();
        if (!$user){
            return response()->json([
                'status' => 'error',
                'message' => 'User Not Found'
            ], 404);
        }

        // check jika password salah
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid Credentials'
            ], 401);
        }

        // jika sukses meng generate token

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'token' => $token,
            'user' => $user,
        ], 200);











        // if(!auth()->attempt($request->only('email','password'))) {
        //     return response()->json([
        //         'message' => 'Invalid login details'
        //     ], 401);
        // }

        // $user = auth()->user();
        // $token = $user->createToken('token-name')->plainTextToken;

        // return response()->json([
        //     'message' => 'Login Successfully',
        //     'user' => $user,
        //     'token' => $token,
        // ]);
    }
}
