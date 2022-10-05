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

    function addFavorites(Request $request) {
        $check_favorates = Favorite::select("user_id", "favorated_id")
                                        ->where("user_id",$request->user_id)
                                        ->where("favorated_id",$request->fav_id)
                                        ->get();
        if($check_favorates->isEmpty()) {
            $insert_fav = Favorite::create([
                "user_id" => $request->user_id,
                "favorated_id" => $request->fav_id
            ]);
            $insert_fav->save();
            return response()->json([
                "Response"=>"Added"
            ]);
        }else{
            $check_favorates = Favorite::select("user_id", "favorated_id")
                                        ->where("user_id",$request->user_id)
                                        ->where("favorated_id",$request->fav_id)
                                        ->delete();
            return response()->json([
                "Response"=>"removed"]);
        }
        
        
        
        // return response()->json([
        //     "Response"=>"Success",
        //     "hi"=>$insert_fav,
        //     "bye"=>$check_favorates
        // ]);
    
    }


}
