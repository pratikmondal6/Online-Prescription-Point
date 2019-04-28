@extends('layouts.admin')

@section('title')
Admin-Doctor & admin List
@endsection

@section('styleSection')
    <style>
    .row,th{
    text-align: center;
    }
    </style>
@endsection

@section('dl')
  class='active'    
@endsection

@section('ul')
  class='active'    
@endsection

@section('customBody')
<div class="col-sm-8 col-sm-offset-2">

 <div class="panel panel-info">
     <div class="panel-heading">
         <h3 style="text-align:center" class="panel-title">Doctor & Pharmacy List</h3>
     </div>
     <div class="panel-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
         <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
        </div>
        @endif


         <table class="table">
             <thead>
                 <tr>
                     <th>Sl No</th>
                     <th>Name</th>
                     <th>Address</th>
                     <th>Type</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
              @if (count($uList) != 0)
              @for ($i = 0; $i < count($uList); $i++)
              <tr>
                <td>{{$i+1}}</td>
                <td>{{$uList[$i]->u_name}}</td>
                <td>{{$uList[$i]->u_location}}</td>
                <td>{{$uList[$i]->u_type}}</td>
              <td>
                <a data-toggle="modal" data-target="#myModal-view-{{$uList[$i]->user_id}}" class="btn btn-success">VIEW</a>
                <a data-toggle="modal" data-target="#myModal-edit-{{$uList[$i]->user_id}}" class="btn btn-default">EDIT</a>
                <a data-toggle="modal" data-target="#myModal-delete-{{$uList[$i]->user_id}}" class="btn btn-danger">DELETE</a>

              </td>
  <!-- Modal for view -->
  <div class="modal fade" id="myModal-view-{{$uList[$i]->user_id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Information of {{$uList[$i]->u_name}}</h4>
        </div>
        <div class="modal-body">
          <div class="panel panel-info">
            <div class="panel-heading">
                <h4 style="text-align:center" >Name: {{$uList[$i]->u_name}}</h4>
                <h5 style="text-align:center" >Email: {{$uList[$i]->u_email}}</h5>
                <h5 style="text-align:center" >Location: {{$uList[$i]->u_location}}</h5>
                <h5 style="text-align:center" >User Type: {{$uList[$i]->u_type}}</h5>
                <h5 style="text-align:center" >Gender: {{$uList[$i]->u_gender}}</h5>
                <h5 style="text-align:center" >Date of Birth: {{$uList[$i]->u_dob}}</h5>
                <h5 style="text-align:center" >Account Status: {{$uList[$i]->status}}</h5>
                <h5 style="text-align:center" >Hospital name: {{$uList[$i]->hospital_name}}</h5>
               @if ($uList[$i]->u_type == 'Doctor')
               
               <h5 style="text-align:center" >Degree: {{$uList[$i]->degree}}</h5>
               @endif 
                <h5 style="text-align:center" >Licenese Number: {{$uList[$i]->lic_no}}</h5>
            </div>             
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    
<!-- Modal for edit -->
  <div class="modal fade" id="myModal-edit-{{$uList[$i]->user_id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Information of {{$uList[$i]->u_name}}</h4>
        </div>
        <div class="modal-body">
          <div class="panel panel-info">
            <div class="panel-heading">
                <h4 style="text-align:center" >Edit Account Info</h4>
            </div>
            <div class="panel-body">
            <form method="post" action="{{route('admin.editUser',$uList[$i]->user_id)}}">
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

             <div class="form-group">
              <input type="text" class="form-control" name="u_name" placeholder="Your Name" value="{{$uList[$i]->u_name}}" data-toggle='tooltip' title='Name'>
              </div>

              <div class="form-group">
                  <input type="email" class="form-control" name="u_email" placeholder="Email Address" value="{{$uList[$i]->u_email}}" data-toggle='tooltip' title='Email Address'>
              </div>

              <div class="form-group">
                  <input type="text" class="form-control" name="u_location" placeholder="Location" value="{{$uList[$i]->u_location}}" data-toggle='tooltip' title='Location'>
              </div>

              <div class="form-group">
                  <input type="text" class="form-control" name="status" placeholder="Account Status" value="{{$uList[$i]->status}}" data-toggle='tooltip' title='Account Status'>
              </div>

              <div class="form-group">
                  <input type="text" class="form-control" name="hospital_name" placeholder="Hospital name" value="{{$uList[$i]->hospital_name}}" data-toggle='tooltip' title='Hospital name'>
              </div>

              @if ($uList[$i]->u_type == 'Doctor')
               <div class="form-group">
                  <input type="text" class="form-control" name="degree" placeholder="Degree" value="{{$uList[$i]->degree}}" data-toggle='tooltip' title='Degree'>
              </div>
                  
              @else
              <div class="form-group">
                  <input type="hidden" class="form-control" name="degree" placeholder="Degree" value="{{$uList[$i]->degree}}" data-toggle='tooltip' title='Degree'>
              </div>
              @endif

              <div class="form-group">
                  <input type="text" class="form-control" name="lic_no" placeholder="License Number" value="{{$uList[$i]->lic_no}}" data-toggle='tooltip' title='License Number'>
              </div>

              <div class="form-group">

                  <button type="submit" class="btn btn-large btn-block btn-info">Update Info</button>

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


        <!-- Modal for delete -->
  <div class="modal fade" id="myModal-delete-{{$uList[$i]->user_id}}" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Warning</h4>
          </div>
          <div class="modal-body">
            <div class="panel panel-info">
              <div class="panel-heading">
                  <h4 style="text-align:center" >Delete Account of <strong>{{$uList[$i]->u_name}}</strong></h4>
              </div>             

              <div class="panel-body">
                <form method='post' action="{{route('admin.deleteUser',$uList[$i]->user_id)}}">
                  @csrf
                  <h5 style="text-align:center" >Once click on delete, its parmanently delete</h5>
                  <h6 style="text-align:center;color:red" >Do you want to delete?</h6>
                  <button type="submit" style="width:30%" class="btn btn-danger">DELETE</button>
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
                   <td style="colh2:4">No available user found in th system</td>
                  </tr>
              @endif
             </tbody>
         </table>


         <div class="col-xs-12">
             <a href="{{route('admin.index')}}" class="btn btn-block btn-danger">Back</a>
         </div>



     </div>
 </div>

</div>
@endsection

