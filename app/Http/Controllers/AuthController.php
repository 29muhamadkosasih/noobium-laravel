<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\SignUpRequest;
use App\Http\Requests\Auth\SignInRequest;
use App\Models\User;
class AuthController extends Controller
{
    public function signUp(SignUpRequest $request)
    {
        $validated = $request->validated();
        $user = User::create([
            'name'      => $validated['name'],
            'email'     => $validated['email'],
            'password'  => bcrypt($validated['password']),
            'picture'   => env('AVATAR_GENERATOR_URL') . $validated['name'],
        ]);

        $token = auth()->login($user);

        if (!$token)
        {
            return response()->json([
                'meta' =>[
                    'code'      =>500,
                    'status'    =>'error',
                    'message'   =>'Cannot add user.'
                ],
                'data' =>[],
            ], 500);
        }
        return response()->json([
            'meta' =>[
                'code'      =>200,
                'status'    =>'succes',
                'message'   =>'User created succesfully.'
            ],
            'data'  => [
                'user' =>[
                    'name' =>$user->name,
                    'email' =>$user->email,
                    'picture' =>$user->picture,
                ],
                'access_token' => [
                    'token' =>$token,
                    'type' =>'Bearer',
                    'expires_in' =>strtotime('+' . auth()->factory()->getTTL() . 'minutes'),
                ]
            ],
        ]);
    }

    public function signIn(SignInRequest $request)
    {
        $token = auth()->attempt($request->all());

        if (!$token)
        {
            return response()->json([
                'meta' => [
                    'code' => 401,
                    'status' => 'error',
                    'message' => 'incorrect email or password',
                ],
                'data' => [],
            ],401);
        }
        $user = auth()->user();
        // dd($user);
        return response()->json([
            'meta' => [
                'code' => 200,
                'status' =>'success',
                'message' => 'Signed in successfully',
            ],
            'data'  => [
                'user' =>[
                    'name' =>$user->name,
                    'email' =>$user->email,
                    'picture' =>$user->picture,
                ],
                'access_token' => [
                    'token' =>$token,
                    'type' =>'Bearer',
                    'expires_in' =>strtotime('+' . auth()->factory()->getTTL() . 'minutes'),
                ]
            ],
        ]);
    }

    public function signOut()
    {
        auth()->logout();

        return response()->json([
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => 'Sign Out Successfully',
            ],
            'data' => [],
        ]);
    }

    public function refresh()
    {
        $user = auth()->user();
        $token = auth()->fromUser($user);
        return response()->json([
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => 'toKen Successfully',
            ],
            'data' => [
                'user' =>[
                    'name' =>$user->name,
                    'email' =>$user->email,
                    'picture' =>$user->picture,
                ],
                'access_token' => [
                    'token' =>$token,
                    'type' =>'Bearer',
                    'expires_in' =>strtotime('+' . auth()->factory()->getTTL() . 'minutes'),
                ]
            ],
        ]);
    }
}
