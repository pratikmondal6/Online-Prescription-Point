<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
   public function index(){
        return view('login.index');
   } 

   public function check(Request $req){
       $user = DB::table('users')
                    ->where('u_email','=',$req->email)
                    ->where('u_pass','=',$req->pass)
                    ->first();
        if($user){
            session(['user' => $user]);
            
            if($user->u_type == "Doctor")
            return redirect()->route('doctor.index');
            
            else if($user->u_type == "Pharmacy")
            return redirect()->route('pharmacy.index');
            
            else if($user->u_type == "Admin")
            return redirect()->route('admin.index');
        }else{
            $patient = DB::table('prescriptions')
                    ->where('p_email','=',$req->email)
                    ->where('p_pass','=',$req->pass)
                    ->first();
            if($patient){
                session(['user' => $patient]);
            return redirect()->route('patient.index');
            }
            return back()->with('success', 'Invalid User!');
        }  
    }
}
