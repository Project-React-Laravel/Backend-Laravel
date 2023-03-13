<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LoginController extends Controller
{
    public function Login(Request $r){
        // $validator = Validator::make($r->all(),[
        //     'email' => 'required|string|email',
        //     'password' => 'required|string',
        // ]);
        // if ($validator->fails()) {
        //     return response()->json(['error'=>"Login không thành công!"], 401);      
        // }
        $user = User::where("email",$r->email)->get();
        return $user;  
    }
}
