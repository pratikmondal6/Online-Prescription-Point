@extends('layouts.patient')

@section('title')
Patient-Prescription
@endsection

@section('styleSection')
    <style>
    .row{
    text-align: center;
    }
    </style>
@endsection

@section('avp')
  class='active'    
@endsection

@section('customBody')
<div class="col-sm-7 col-sm-offset-3">

  <div class="panel panel-info">
      <div class="panel-heading">
          <span style="text-align:center;font-size:30px" class="panel-title h1">{{$data->hospital_name}}</span>
          <h4 style="text-align:center" >{{$data->u_name}}</h4>
          <h5 style="text-align:center" >{{$data->degree}}</h5>
          <h5 style="text-align:center" >{{$data->u_email}}</h5>
          <h5 style="text-align:center">Date: {{now()->toDateString('Y-m-d')}}</h5>
      </div>
      <div class="panel-body">

            <div class="col-xs-12">

            <div class="row">  
              <div class="col-sm-4 form-group">
                Problem Details
			        <textarea class="form-control" style="border: none;" readonly rows="6">{{preg_replace('/\<br(\s*)?\/?\>/i', "", $data->p_problem)}}</textarea>
              </div>
              <div class="col-sm-8 form-group">
                Medicines
                    <textarea class="form-control" style="border: none;" readonly rows="6">{{preg_replace('/\<br(\s*)?\/?\>/i', "", $data->p_medicine)}}</textarea>
              </div>
            </div>
              <div class="form-group">

                  <a href="{{route('patient.index')}}" class="btn btn-large btn-block btn-danger">Back</a>

              </div>
            </div>
      </div>
  </div>

</div>
@endsection