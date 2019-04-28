<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('users')
                    ->where('id','=',session('user')->id)
                    ->first();
        return view('admin.index')->withUser($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')
                        ->where('id',session('user')->id)
                        ->first();
        return view('admin.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $req->validate([
            'u_name' => 'required',
            'u_email' => 'required',
            'u_pass' => 'required|same:c_pass',
            'u_dob' => 'required|date',
            'u_location' => 'required',

        ]);

        $status = DB::table('users')
            ->where('id','=',$id)
            ->update([
            'u_name' => $req->u_name,
            'u_email' => $req->u_email,
            'u_pass' => $req->u_pass,
            'u_dob' => $req->u_dob,
            'u_location' => $req->u_location
        ]);

        if($status){
            return back()->with('success','Information Updated successfully');
        }
        else{
            return back()->with('success','You update nothing');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //delete patient account
    public function deletePatient($id)
    {

        $status_p = DB::table('prescriptions')
            ->where('id',$id)
            ->delete();
        
        if($status_p)
        return back()->with('success','Suscessfully deleted one Patient.');
        else
        return back()->with('success','Error occured while deleting');
    }

    //delete user account
    public function deleteUser($id)
    {
        $status = DB::table('users')
            ->where('id',$id)
            ->delete();

        $status_a = DB::table('additional_info')
            ->where('user_id',$id)
            ->delete();

        $status_p = DB::table('prescriptions')
            ->where('doctor_id',$id)
            ->delete();
        
        if($status || $status_a || $status_p)
        return back()->with('success','Suscessfully deleted one user.');
        else
        return back()->with('success','Error occured while deleting');
    }


    public function showAllUser(){
        $uList = DB::table('users')
                    ->where('users.id','<>',session('user')->id)
                    ->join('additional_info', 'users.id', '=', 'additional_info.user_id')
                    ->select('users.*', 'additional_info.*')
                    ->get();
        return view('admin.dr_ph_list')->withUList($uList);
    }

    public function editUser(Request $req, $id){
        $req->validate([
            'u_name' => 'required',
            'u_email' => 'required|email',
            'u_location' => 'required',
            'status' => 'required|numeric',
            'hospital_name' => 'required',
            'degree' => 'required',
            'lic_no' => 'required',
        ]);

        $status = DB::table('users')
            ->where('id',$id)
            ->update([
            'u_name' => $req->u_name,
            'u_email' => $req->u_email,
            'status' => $req->status,
            'u_location' => $req->u_location
        ]);

        $add_status = DB::table('additional_info')
                            ->where('user_id',$id)
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


    //get all patient
    public function showAllPatient(){
        $pList = DB::table('prescriptions')
                    ->get();
        return view('admin.patient_list')->withPList($pList);
    }

    public function editPatient(Request $req, $id){
        $req->validate([
            'p_name' => 'required',
            'p_email' => 'required|email',
            'p_location' => 'required',
            'p_phone' => 'required|numeric',
            'p_age' => 'required|numeric',

        ]);

        $status = DB::table('prescriptions')
            ->where('id',$id)
            ->update([
            'p_name' => $req->p_name,
            'p_email' => $req->p_email,
            'p_phone' => $req->p_phone,
            'p_age' => $req->p_age,
            'p_location' => $req->p_location
        ]);


        if($status){
            return back()->with('success','Information Updated successfully');
        }
        else{
            return back()->with('success','You update nothing');
        }
    }

}
