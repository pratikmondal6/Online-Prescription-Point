@extends('layouts.master')

@section('title')
Doctor-Notification
@endsection

@section('styleSection')
    <style>
    .row{
    text-align: center;
    }
    </style>
@endsection

@section('an')
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
<div class="col-sm-6 col-sm-offset-3">

 <div class="panel panel-info">
     <div class="panel-heading">
         <h3 style="text-align:center" class="panel-title">Available Prescriptions to delivery</h3>
     </div>
     <div class="panel-body">


         <table class="table">
             <thead>
                 <tr>
                     <th>Sl No</th>
                     <th>Patient Name</th>
                     <th>Patient Address</th>
                     <th>Date</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
              @if (count($notify) != 0)
              @for ($i = 0; $i < count($notify); $i++)
              <tr>
                <td>{{$i+1}}</td>
                <td>{{$notify[$i]->p_name}}</td>
                <td>{{$notify[$i]->p_location}}</td>
                <td>{{$notify[$i]->visit_date}}</td>
              <td><a data-toggle="modal" data-target="#myModal-{{$notify[$i]->id}}" class="btn btn-success">VIEW</a></td>
  <!-- Modal -->
  <div class="modal fade" id="myModal-{{$notify[$i]->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Prescription of {{$notify[$i]->p_name}}</h4>
        </div>
        <div class="modal-body">
          <div class="panel panel-info">
            <div class="panel-heading">
                <h4 style="text-align:center" >Patient Name: {{$notify[$i]->p_name}}</h4>
                <h5 style="text-align:center" >Patient Email: {{$notify[$i]->p_email}}</h5>
                <h5 style="text-align:center" >Patient Phone # {{$notify[$i]->p_phone}}</h5>
                <h5 style="text-align:center">Visit Date: {{now()->toDateString('Y-m-d')}}</h5>
            </div>
            <div class="panel-body">
            <form method="post" action="{{route('doctor.updateMedicine',$notify[$i]->id)}}">
                @csrf
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

                   <div class="row">  
                    <div class="col-sm-4 form-group">
                    <textarea id="plm" class="form-control" readonly placeholder="Patient Probelms" name="p_problem" required rows="4">{{preg_replace('/<br\\s*?\/??>/i', '', $notify[$i]->p_problem)}}</textarea>
                    </div>
                    <div class="col-sm-8 form-group">
                          <textarea id="md" class="form-control" placeholder="Suggested Medicine and Taking Time" name="p_medicine" required rows="4">{{preg_replace('/<br\\s*?\/??>/i', '', $notify[$i]->p_medicine)}}</textarea>
                    </div>
                  </div>

                   <div class="row">  
                     <div class="col-sm-12 form-group">
                      <h4>Request MSG: {{preg_replace('/<br\\s*?\/??>/i', '', $notify[$i]->req_message)}}</h4>
                     </div>


                   <div class="col-sm-12 form-group">
                    <button type="submit" class="btn btn-info btn-block">Update Medicine</button>
                     </div>
                   </div>
                   
                </form>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
             </tr>

              @endfor
              @else
                  <tr>
                   <td style="colspan:4">No change medicine request</td>
                  </tr>
              @endif
             </tbody>
         </table>


         <div class="col-xs-12">
             <a href="http://" class="btn btn-block btn-danger">Back</a>
         </div>



     </div>
 </div>

</div>
@endsection
