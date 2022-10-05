<?php

namespace App\Http\Controllers;

use App\Models\Block;
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
    }

    function block(Request $request) {
        $insert_delete = Block::create([
            "blocker_id" => $request->blocker_id,
            "blocked_id" => $request->blocked_id
        ]);
        $insert_delete->save();
        return response()->json([
            "Response"=>"blocked"
        ]);
    }

    function view(Request $request) {
        $id = $request->id;
        $view = User::select("*")
                        ->where("id", $id)
                        ->get();
                                
        return response()->json([
            "Status" => "Success",
            "response" => $view
        ]);
    }

    function edit(Request $request) {
        $id = $request->id;
        $updated = [
        "full_name" => $request->full_name,
        "email" =>$request->email,
        "gender" => $request->gender,
        "interest" => $request->interest,
        "age" => $request->age,
        "password" => $request->password,
        "location" => $request->location,
        "profile_picture" => $request->profile_picture,
        "bio" => $request->bio,
        "visible" => $request->visible];
        $values = User::select("*")
                        ->where('id', $id)
                        ->update($updated);

        return response()->json([
            "Status" => "Success",
            "response" => $values
        ]);
    }

}
