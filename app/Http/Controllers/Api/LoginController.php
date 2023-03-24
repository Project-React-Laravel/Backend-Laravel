<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function Login(Request $r){
        $user = Users::find($r->email);
        $password = hash::make($r->password);
        if($user){
            if(Hash::check($r->password,$user->password)){
                return response()->json([
                    'success' => 'Đăng nhập thành công!',
                    'user' => $user
                ], 201);
             }else{
                return response()->json([
                    'error' => 'Đăng nhập thất bại!'
                ], 401);
             }
        }
    }
}
