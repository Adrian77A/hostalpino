<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    #get all users
    public function getUser(){
        return response()->json(User::all(), 200);
            #Status Json
                #Status 200 good
    }

    #search user
    public function getUserid($id){
        $get_user = User::findOrFail($id);
        return response()->json($get_user, 200);
    }

    #add user
    public function insertUser(Request $request){
        $data_user = User::create($request->all());
        return response($data_user, 200);
    }

    #update user
     public function updateUser(Request $request, $id){
        $get_user = User::findOrFail($id);
        $get_user->update($request->all());
        return response($get_user, 200);
    }

    #User delete
    public function deleteUser($id){
        $get_user = Category::findOrFail($id);
        $get_user->delete();
        return response()->json(['Mensaje ' => 'Usuario elimiando'], 200);
    }


}
