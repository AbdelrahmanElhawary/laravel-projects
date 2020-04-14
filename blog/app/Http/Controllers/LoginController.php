<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
class LoginController extends Controller
{
    //
    public function login(Request $req){
        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password])){

            $user=User::where('email',$req->email)->first();

            if($user->is_admin()){
                return redirect()->route('dashboard')->with(['user'=>$user]);
            }

            return redirect()->route('home')->with(['user'=>$user]);
        }
        return redirect()->back();
    }
}
