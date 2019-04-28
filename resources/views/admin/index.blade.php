@extends('layouts.admin')

@section('title')
Admin
@endsection

@section('styleSection')
    <style>
    .row{
    text-align: center;
    }
    </style>
@endsection

@section('ah')
  class='active'    
@endsection


@section('customBody')
  <div style='background-color: #e6e6e6;' class='col-sm-5 col-sm-offset-3'>
   <h2>Information about</h2>
   <img class='img-circle' src='{{asset("/assets/images/admin.png")}}' width='150' height='150'>
   <br><br>
   <ul class='list-group'>
    <li class='list-group-item' data-toggle='tooltip' title='Name'><strong>{{$user->u_name}}</strong></li>

    <li class='list-group-item' data-toggle='tooltip' title='Email Address'><strong style='color: grey;'>{{$user->u_email}}</strong></li>

    <li class='list-group-item'  data-toggle='tooltip' title='Gender'><strong>{{$user->u_gender}}</strong></li>

    <li class='list-group-item' data-toggle='tooltip' title='Location'><strong>{{$user->u_location}}</strong></li>

    <li class='list-group-item' data-toggle='tooltip' title='Date Of Birth'><strong>{{$user->u_dob}}</strong></li>
   </ul>
 </div>
@endsection
