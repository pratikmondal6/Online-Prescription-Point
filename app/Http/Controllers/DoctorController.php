<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function index(){

        if(session('user')->status == 0){
            return redirect()->route('signup.additionalInfo');
        }
        else{
        $notify = DB::table('prescriptions')
            ->where([
                ['req_status','=',0],
                ['doctor_id','=',session('user')->id]
            ])
            ->get();
        return view('doctor.index')->withUser(session('user'))->withNotify($notify);
    }
}

    //Edit Profile-Get
    public function editProfile(){

        $user = DB::table('users')
                            ->where('id',session('user')->id)
                            ->first();

        $additional = DB::table('additional_info')
                            ->where('user_id',session('user')->id)
                            ->first();

        return view('doctor.edit')->withUser($user)->withUserAdditional($additional);
    }

    //Edit Profile-post
    public function updateInfo(Request $req){
        $req->validate([
            'u_name' => 'required',
            'u_email' => 'required',
            'u_pass' => 'required',
            'u_dob' => 'required',
            'u_location' => 'required',
            'hospital_name' => 'required',
            'degree' => 'required',
            'lic_no' => 'required',
        ]);

        $status = DB::table('users')
            ->where('id',session('user')->id)
            ->update([
            'u_name' => $req->u_name,
            'u_email' => $req->u_email,
            'u_pass' => $req->u_pass,
            'u_dob' => $req->u_dob,
            'u_location' => $req->u_location
        ]);

        $add_status = DB::table('additional_info')
                            ->where('user_id',session('user')->id)
                            ->update([
                                'hospital_name' => $req->hospital_name,
                                'degree' => $req->degree,
                                'lic_no' => $req->lic_no,
                            ]);

        if($status || $add_status){
            return back()->with('success','Information Updated successfully');
        }
        else{
            return back()->with('success','You update nothing');
        }
    }


    //View - Fill prescription for patient
    public function createPrescription(){
        $user = DB::table('users')
                            ->where('id',session('user')->id)
                            ->first();

        $additional = DB::table('additional_info')
                            ->where('user_id',session('user')->id)
                            ->first();

        return view('doctor.prescription')->withUser($user)->withUserAdditional($additional);
    }

    //store prescription
    public function storePrescription(Request $req){
        $req->validate([
            'p_name' => 'required',
            'p_email' => 'required',
            'p_phone' => 'required',
            'p_age' => 'required',
            'p_problem' => 'required',
            'p_medicine' => 'required',
        ]);       
    $status = DB::table('prescriptions')
        ->insert([
        'doctor_id' => session('user')->id,
        'p_name' => $req->p_name,
        'p_email' => $req->p_email,
        'p_phone' => $req->p_phone,
        'p_location' => $req->p_location,
        'p_age' => $req->p_age,
        'p_gender' => $req->p_gender,
        'p_problem' => nl2br($req->p_problem),
        'p_medicine' => nl2br($req->p_medicine),
        'visit_date' => now()->toDateString('Y-m-d'),
    ]);

    if($status){
        return back()->with('success','Prescripton created successfully');
    }
    else{
        return back()->with('success','Probelm Occured while creating prescripton');
    }

    }

    //show notification
    public function showNotification(){
        $notify = DB::table('prescriptions')
                    ->where([
                        ['req_status','=',0],
                        ['doctor_id','=',session('user')->id]
                    ])
                    ->get();
        return view('doctor.notification')->withNotify($notify);
    }

    //update medicine
    public function updateMedicine(Request $req,$id){
        $req->validate([
            'p_medicine' => 'required'
        ]);
    $status = DB::table('prescriptions')
        ->where('id',$id)
        ->update([
            'p_medicine' => nl2br($req->p_medicine),
            'req_message' => 'NONE',
            'req_status' => 1,
        ]);
    return redirect()->route('doctor.showNotification');
    }
}
