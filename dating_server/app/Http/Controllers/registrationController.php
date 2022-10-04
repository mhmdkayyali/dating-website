<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller{
    function login(Request $request){

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

    function signup(Request $request) {
        $email = User::select("email")
                        ->where("email", $request->email)
                        ->get();
        
        if($email->isEmpty()) {  
            $signup = User::create([
                "full_name" => $request->full_name,
                "email" =>$request->username,
                "gender" => $request->password,
                "interest" => $request->age,
                "age" => $request->gender,
                "password" => $request->interested,
                "location" => $request->location,
                "profile_picture" => $request->profile_picture
                ]);
                if ($signup->save()){
                    return response()->json([
                        "Status"=>"Success"
                    ]);
                } else{
                    return response()->json([
                        "Status"=>"Failed"
                    ]);
                }
        }else{
            return response()->json([
                "Status"=>"Failed"
            ]);
        }
    }

}
