<?php

namespace App\Http\Controllers\Me;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();

        return response()->json([
            'meta' =>[
                'code'      =>200,
                'status'    =>'succes',
                'message'   =>'User data fetched succesfully.'
            ],
            'data'  => [
                'name' =>$user->name,
                'email' =>$user->email,
                'picture' =>$user->picture,
                ]
        ]);
    }
}
