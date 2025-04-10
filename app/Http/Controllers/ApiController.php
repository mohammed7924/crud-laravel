<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function login(): \Illuminate\Http\JsonResponse
    {
        $email = request('email');
        $password = request('password');

        $user = Customer::where('email', $email)->first();

        if ($user) {
            return response()->json([
                'status' => 200,
                'data' => $user,
                'email' => $email,
                'password' => $password, 
                'message' => 'Valid credentials',
            ]);
        }

        return response()->json([
            'status' => 250,
            'email' => $email,
            'password' => $password,
            'message' => 'Invalid credentials',
        ]);
    }

    public function getProfile(Request $request): \Illuminate\Http\JsonResponse
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
