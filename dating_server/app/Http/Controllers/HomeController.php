<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class HomeController extends Controller{
    function feed(Request $request) {
        $myEmail = $request->email;
        $myInterest = $request->interest;
        $interested_in = User::select("id", "full_name", "age", "location")
                                ->where("gender", $myInterest)
                                ->where("email", "!=", $myEmail)
                                ->get();
                                
        return response()->json([
            "Status" => "Success",
            "response" => $interested_in
        ]);
    }

    function addFavorites(Request $request, $id = "add") {
        
    
    }






}
