<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // pertemuan 7
    public function register(Request $request)
    {
        // menangkap input
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        // menginsert data ke table user
        $user = User::create($input);

        $data = [
            'message' => 'User is created successfully'
        ];

        return response()->json($data, 200);
    }

    public function login(Request $request)
    {
        // menangkap input
        $input = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // mengambil data user (db)
        $user = User::where('email', $input['email'])->first();

        // membandingkan input user dengan data db
        $isLoginSuccessfully = (
            $input['email'] == $user->email && Hash::check($input['password'], $user->password)
        );

        if ($isLoginSuccessfully) {
            // membuat token
            $token = $user->createToken('auth_token');

            $data = [
                'message' => 'Login successfully',
                'token' => $token->plainTextToken
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Username or Password is wrong'
            ];

            return response()->json($data. 401);
        }
    }
}
