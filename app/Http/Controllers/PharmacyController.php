<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('users')
                    ->where('id',session('user')->id)
                    ->first();
        $notify = DB::table('prescriptions')
                    ->where('p_location','=',$user->u_location)
                    ->get();
        return view('pharmacy.index')->withUser($user)->withNotify($notify);
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
        $notify = DB::table('prescriptions')
                        ->where('p_location','=',session('user')->u_location)
                        ->get();
        return view('pharmacy.notification')
                    ->withUser(session('user'))
                    ->withNotify($notify);
    }

    public function storeRequest(Request $req,$id){
        $status = DB::table('prescriptions')
                    ->where('id',$id)
                    ->update([
                        'req_message' => nl2br($req->req_message),
                        'req_status' => 0,
                    ]);
            return redirect()->route('pharmacy.show',session('user')->id);
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
                ->join('additional_info', 'users.id', '=', 'additional_info.user_id')
                ->select('users.*', 'additional_info.*')
                ->where('users.id',$id)
                ->first();
        return view('pharmacy.edit')->withUser($user);
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
            'u_pass' => 'required',
            'u_dob' => 'required',
            'u_location' => 'required',
            'hospital_name' => 'required',
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
                                'lic_no' => $req->lic_no,
                            ]);

        if($status || $add_status){
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
