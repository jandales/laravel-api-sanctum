<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;

class AuthController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(StoreUserRequest $request)
    {  
        $validated = $request->validated();  
        $validated['phone'] = $request->phone;
        $validated['password'] = Hash::make($request->password);
        $user = User::create($validated);
        $token = $user->createToken($user->id); 

        return [
            'user' => $user,
            'token' => $token->plainTextToken
        ];
    }

    public function login(LoginRequest $request)
    {
        $validated = $request->validated(); 

        $user = User::where('email', $validated['email'])->first();

        if(!$user || !Hash::check($validated['password'],$user->password))
        {
            return [
                'message' => 'Invalid email or password'               
            ];
        }

        $token = $user->createToken($user->id);
                 
        return [
            'user' => $user,
            'token' => $token->plainTextToken
        ];      


    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return [
            'message' => 'User successfuly logout'
        ];
    }
}
