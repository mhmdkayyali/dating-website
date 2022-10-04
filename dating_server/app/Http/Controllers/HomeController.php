<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class HomeController extends Controller{
    function feed(Request $request) {
        $myId = $request->my_id;
        $myInterest = $request->my_interest;
        $interested_id = User::select("id", "full_name")
                                ->where("gender", $myInterest)
                                ->get();
                                
        return response()->json([
            "Status" => "Success",
            "response" => $interested_id
        ]);
    }












}
