<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $login = User::select("*")
            ->where('password', $password)
            ->where('email', $email)
            ->get();
        if (!$login->isEmpty()) {
            return response()->json([
                "status" => "Success"
            ]);
        }
        return response()->json([
            "status" => "failed"
        ]);
    }
}
