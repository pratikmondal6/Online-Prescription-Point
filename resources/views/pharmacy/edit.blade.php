@extends('layouts.master')

@section('title')
Pharmacy-Edit Profile
@endsection

@section('styleSection')
    <style>
    .row{
    text-align: center;
    }
    </style>
@endsection

@section('aep')
  class='active'    
@endsection

@section('ahh')
  href="{{route('pharmacy.index')}}"
@endsection
@section('aeph')
  href="{{route('pharmacy.edit',[$user->id])}}"
@endsection
@section('anh')
  href="{{route('pharmacy.show',[$user->id])}}"
@endsection

@section('customBody')
<div class="col-sm-6 col-sm-offset-3">

  <div class="panel panel-info">
      <div class="panel-heading">
          <h3 style="text-align:center" class="panel-title">Edit Profile</h3>
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

          <form method="post" action="{{route('pharmacy.update',[$user->id])}}">
              @csrf
              {{ method_field('PUT') }}
              <div class="form-group">
              <input type="text" class="form-control" name="u_name" placeholder="Doctor Name" value="{{$user->u_name}}">
              </div>

              <div class="form-group">
                  <input type="email" class="form-control" name="u_email" placeholder="Email Address" value="{{$user->u_email}}">
              </div>

              <div class="form-group">
                  <input type="Password" class="form-control" name="u_pass" placeholder="Password" value="{{$user->u_pass}}">
              </div>

              <div class="form-group">
                  <input type="text" class="form-control" name="u_dob" placeholder="Date Of Birth" value="{{$user->u_dob}}">
              </div>

              <div class="form-group">
                  <input type="text" class="form-control" name="u_location" placeholder="Location" value="{{$user->u_location}}">
              </div>

              <div class="form-group">
                  <input type="text" class="form-control" name="hospital_name" placeholder="Location" value="{{$user->hospital_name}}">
              </div>


              <div class="form-group">
                  <input type="text" class="form-control" name="lic_no" placeholder="License Number" value="{{$user->lic_no}}">
              </div>

              <div class="form-group">

                  <button type="submit" class="btn btn-large btn-block btn-info">Update Info</button>

              </div>

              <div class="form-group">

                  <a href="{{route('pharmacy.index')}}" class="btn btn-large btn-block btn-danger">Back</a>

              </div>
          </form>
      </div>
  </div>

</div>
    
@endsection