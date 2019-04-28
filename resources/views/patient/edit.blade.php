@extends('layouts.patient')

@section('title')
Patient-Edit Profile
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

          <form method="post" action="{{route('patient.update',[$user->id])}}">
              @csrf
              {{ method_field('PUT') }}
              <div class="form-group">
              <input type="text" class="form-control" name="p_name" placeholder="Your Name" value="{{$user->p_name}}" data-toggle='tooltip' title='Name'>
              </div>

              <div class="form-group">
                  <input type="email" class="form-control" name="p_email" placeholder="Email Address" value="{{$user->p_email}}" data-toggle='tooltip' title='Email Address'>
              </div>

              <div class="form-group">
                  <input type="Password" class="form-control" name="p_pass" placeholder="Password" value="{{$user->p_pass}}" data-toggle='tooltip' title='Password'>
              </div>

              <div class="form-group">
                  <input type="Password" class="form-control" name="c_pass" placeholder="Confirm Password" value="{{$user->p_pass}}" data-toggle='tooltip' title='Confirm password'>
              </div>

              <div class="form-group">
                  <input type="number" class="form-control" name="p_age" placeholder="Age" value="{{$user->p_age}}" data-toggle='tooltip' title='Age'>
              </div>

              <div class="form-group">
                  <input type="text" class="form-control" name="p_location" placeholder="Location" value="{{$user->p_location}}" data-toggle='tooltip' title='Location'>
              </div>

              <div class="form-group">

                  <button type="submit" class="btn btn-large btn-block btn-info">Update Info</button>

              </div>

              <div class="form-group">

                  <a href="{{route('patient.index')}}" class="btn btn-large btn-block btn-danger">Back</a>

              </div>
          </form>
      </div>
  </div>

</div>
    
@endsection