<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
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

    function addOrGetFavorites(Request $request, $id = "add") {
        if($id == "add") {
            $favorite = new Favorite;
        }else {
            $favorite = Favorite::select($id);
        }

        $favorite->id = $request->id ? $request->id : $favorite->id;
        // $favorite->category_id = $request->category_id? $request->category_id : $favorite->category_id;
        if($favorite->save()){
            return response()->json([
                "status" => "Success",
                "data" => $favorite
            ]);
        }

        return response()->json([
            "status" => "Error",
            "data" => "Error creating a model"
        ]);
    
    }












}
