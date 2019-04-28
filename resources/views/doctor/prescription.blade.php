@extends('layouts.master')

@section('title')
Doctor-Prescription
@endsection

@section('styleSection')
    <style>
    .row{
    text-align: center;
    }
    </style>
@endsection

@section('ap')
  class='active'    
@endsection

@section('ahh')
  href="{{route('doctor.index')}}"
@endsection
@section('aeph')
  href="{{route('doctor.editProfile')}}"
@endsection
@section('aph')
  href="{{route('doctor.createPrescription')}}"
@endsection
@section('anh')
  href="{{route('doctor.showNotification')}}"
@endsection

@section('p')
<li @yield('ap')>
  <a @yield('aph')>
      <i class="glyphicon glyphicon-link"></i>
      Prescription
  </a>
</li>
@endsection

@section('customBody')
<div class="col-sm-7 col-sm-offset-3">

  <div class="panel panel-info">
      <div class="panel-heading">
          <span style="text-align:center;font-size:30px" class="panel-title h1">{{$userAdditional->hospital_name}}</span>
          <h4 style="text-align:center" >{{$user->u_name}}</h4>
          <h5 style="text-align:center" >{{$userAdditional->degree}}</h5>
          <h5 style="text-align:center" >{{$user->u_email}}</h5>
          <h5 style="text-align:center">Date: {{now()->toDateString('Y-m-d')}}</h5>
      </div>
      <div class="panel-body">

              @if (count($errors) > 0)
              <div class="alert alert-danger">
               <button type="button" class="close" data-dismiss="alert">×</button>
               <ul>
                @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
                @endforeach
               </ul>
              </div>
             @endif
             @if ($message = Session::get('success'))
             <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
                     <strong>{{ $message }}</strong>
             </div>
             @endif

          <form method="post">
              @csrf

            <div class="col-xs-12">
                    <div class="row">
                      <div class="col-sm-6 form-group">
                        <input class="form-control" name="p_name" placeholder="Patient Name" type="text" required value="{{old('p_name')}}">
                      </div>
                      <div class="col-sm-6 form-group">
                        <input class="form-control" name="p_email" placeholder="Email Address" type="email" required value="{{old('p_email')}}">
                      </div>
                    </div>

            <div class="row">  
              <div class="col-sm-6 form-group">
                  <input type="text" class="form-control" name="p_phone" placeholder="Phone Number" value="{{old('p_phone')}}">
              </div>
              <div class="col-sm-6 form-group">
                    <select class="form-control" name="p_location">
                            <option disabled><--Select Location--></option>
                            <option value="Banani" >Banani</option>
                            <option value="Gulsan-1" >Gulsan-1</option>
                            <option value="Gulsan-2" >Gulsan-2</option>
                            <option value="Mohakhali" >Mohakhali</option>
                            <option value="Kuril" >Kuril</option>
                            <option value="Khilkhet" >Khilkhet</option>
                            <option value="Nikunjo-2" >Nikunjo-2</option>
                            <option value="Airport" >Airport</option>
                            </select>
              </div>
            </div>

            <div class="row">  
              <div class="col-sm-6 form-group">
                  <input type="text" class="form-control" name="p_age" placeholder="Age" value="{{old('p_age')}}">
              </div>
              <div class="col-sm-6 form-group">
                    <select class="form-control" name="p_gender">
                            <option disabled><--Select Gender--></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                            </select>
              </div>
            </div>

            <div class="row">  
              <div class="col-sm-4 form-group">
			        <textarea id="plm" class="form-control" placeholder="Patient Probelms" name="p_problem" required rows="4"></textarea>
              </div>
              <div class="col-sm-8 form-group">
                    <textarea id="md" class="form-control" placeholder="Suggested Medicine and Taking Time" name="p_medicine" required rows="4"></textarea>
              </div>
            </div>


              <div class="form-group">

                  <button type="submit" class="btn btn-large btn-block btn-info">Prescribe</button>

              </div> 
              <div class="form-group">

                  <a href="{{route('doctor.index')}}" class="btn btn-large btn-block btn-danger">Back</a>

              </div>
            </div>
          </form>
      </div>
  </div>

</div>
@endsection