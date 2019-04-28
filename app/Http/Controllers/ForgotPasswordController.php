<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForgotPasswordController extends Controller
{
    public function index(){
        return view('login.change_password');
   } 

   public function changePassword(Request $req){
       $user = DB::table('users')
                    ->where('u_email','=',$req->email)
                    ->update(['u_pass'=>$req->pass]);
             if($user){
                    return back()->with('success', 'Password updated!');
            } 
             else{
                    return back()->with('success', 'Entered password was your password!!');
            } 
   }
}
