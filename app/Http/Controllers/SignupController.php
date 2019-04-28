<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignupController extends Controller
{
    public function index(){
        return view('signup.index');
    }

    public function create(Request $req){
        $u_name = $req->f_name.' '.$req->l_name;
        $u_email = $req->email;
        $u_type = $req->type;
        $u_pass = $req->pass;
        $u_gender = $req->gender;
        $u_dob = $req->dob;
        $u_loc = $req->location;

        $status = DB::table('users')->insert(
            ['u_name'=>$u_name,
            'u_email'=>$u_email,
            'u_type'=>$u_type,
            'u_pass'=>$u_pass,
            'u_gender'=>$u_gender,
            'u_dob'=>$u_dob,
            'u_location'=>$u_loc]
        );

        if($status){
            return back()->with('success','Signup successfull!!');
        }


    }

    public function additionalInfo(){
        return view('signup.additional_info')->withType(session('user')->u_type);
    }

    public function insertAdditionalInfo(Request $req){
        $req->validate([
            'hospital_name' => 'required',
            'lic_no' =>'required|unique:additional_info'
        ]);

        if($req->degree == null){
            $req->degree = 'degree';
        }
        $insert = DB::table('additional_info')
                        ->insert([
                            'user_id' => session('user')->id,
                            'hospital_name'=>$req->hospital_name,
                            'degree'=>$req->degree,
                            'lic_no'=>$req->lic_no,

                        ]);
        if($insert){
            $updateStatus = DB::table('users')
                                ->update([
                                    'status' => 1
                                ]);
            return redirect()->route('login.index');
        }
    }

    //ajax call function for email 
    public function getEmail($val){
        $result = DB::table('users')->where('u_email','=',$val)->get();
       return $result;
    }
}