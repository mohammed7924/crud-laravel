<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\User;

class ApiController extends Controller

{

    public function login(){
        $user = Customer::where('email', request('email'))->first();
        if($user){

            return response()->json([
                'status'=>200,
'data'=>$user,
                'email'=>request('email'),
                'password'=>request('password'),
                'message'=>'valid credentials',
            ]);

        }else{
            return response()->json([
                'email'=>request('email'),
                'password'=>request('password'),
                'message'=>'invalid credentials',
                'status'=>250
            ]);

        }


    }
    public function getProfile(Request $request)
    {
        $id = $request->input('id');
        $user = Customer::find($id);

        if (!$user) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found',
            ]);
        }

        return response()->json([
            'status' => 200,
            'data' => [
                'address' => $user->address,
            ],
            'message' => 'User profile fetched successfully',
        ]);
    }
}
