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
                "status" => "Success",
                "interest" => $login[0]->interest
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
                "email" =>$request->email,
                "gender" => $request->gender,
                "interest" => $request->interest,
                "age" => $request->age,
                "password" => $request->password,
                "location" => $request->location
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
