<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('prescriptions')
                    ->where('id',session('user')->id)
                    ->first();
        return view('patient.index')->withUser($user);
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
        $allInfo = DB::table('prescriptions')
                        ->join('users','users.id', '=', 'prescriptions.doctor_id')
                        ->join('additional_info','prescriptions.doctor_id', '=', 'additional_info.user_id')
                        ->where('prescriptions.id',$id)
                        ->first();
        return view('patient.prescription')->withData($allInfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('prescriptions')
                ->where('id',session('user')->id)
                ->first();
        return view('patient.edit')->withUser($user);
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
            'p_name' => 'required',
            'p_email' => 'required',
            'p_pass' => 'required|same:c_pass',
            'p_age' => 'required|numeric',
            'p_location' => 'required',

        ]);

        $status = DB::table('prescriptions')
            ->where('id','=',$id)
            ->update([
            'p_name' => $req->p_name,
            'p_email' => $req->p_email,
            'p_pass' => $req->p_pass,
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
}
