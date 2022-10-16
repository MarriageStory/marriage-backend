<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index()
    {
        $data = User::get();

        return response()->json(['data' => $data]);
    }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json(['data' => $user]);
    }

    public function update(Request $request, $id)
    {
        $attribute = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
            'role_name' => ['required'],
        ]);

        $user = User::find($id);

        $user->update($attribute);

        return response()->json(['data' => $user]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete;

        return response()->json(['messages' => "Berhasil Menghapus Payment"]);
    }

    public function register(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
            'role_name' => ['required'],
        ]);


        $attributes['password'] = Hash::make($request->password);

        $user = User::create($attributes);

        if ($user) {
            return response()->json(['data' => $user]);
        } else {
            abort('403');
        }
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password', 'role_name'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['messages' => "Berhasil Logout"]);
    }
}
