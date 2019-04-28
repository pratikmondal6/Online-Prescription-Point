@extends('layouts.admin')

@section('title')
Admin-Patient List
@endsection

@section('styleSection')
    <style>
    .row,th{
    text-align: center;
    }
    </style>
@endsection

@section('pl')
  class='active'    
@endsection

@section('ul')
  class='active'    
@endsection

@section('customBody')
<div class="col-sm-8 col-sm-offset-2">

 <div class="panel panel-info">
     <div class="panel-heading">
         <h3 style="text-align:center" class="panel-title">Patients List</h3>
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
                     <th>Email</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
              @if (count($pList) != 0)
              @for ($i = 0; $i < count($pList); $i++)
              <tr>
                <td>{{$i+1}}</td>
                <td>{{$pList[$i]->p_name}}</td>
                <td>{{$pList[$i]->p_location}}</td>
                <td>{{$pList[$i]->p_email}}</td>
              <td>
                <a data-toggle="modal" data-target="#myModal-view-{{$pList[$i]->id}}" class="btn btn-success">VIEW</a>
                <a data-toggle="modal" data-target="#myModal-edit-{{$pList[$i]->id}}" class="btn btn-default">EDIT</a>
                <a data-toggle="modal" data-target="#myModal-delete-{{$pList[$i]->id}}" class="btn btn-danger">DELETE</a>

              </td>
  <!-- Modal for view -->
  <div class="modal fade" id="myModal-view-{{$pList[$i]->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Information of {{$pList[$i]->p_name}}</h4>
        </div>
        <div class="modal-body">
          <div class="panel panel-info">
            <div class="panel-heading">
                <h4 style="text-align:center" >Name: {{$pList[$i]->p_name}}</h4>
                <h5 style="text-align:center" >Email: {{$pList[$i]->p_email}}</h5>
                <h5 style="text-align:center" >Location: {{$pList[$i]->p_location}}</h5>
                <h5 style="text-align:center" >Phone # {{$pList[$i]->p_phone}}</h5>
                <h5 style="text-align:center" >Gender: {{$pList[$i]->p_gender}}</h5>
                <h5 style="text-align:center" >Age: {{$pList[$i]->p_age}}</h5>
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
  <div class="modal fade" id="myModal-edit-{{$pList[$i]->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Information of {{$pList[$i]->p_name}}</h4>
        </div>
        <div class="modal-body">
          <div class="panel panel-info">
            <div class="panel-heading">
                <h4 style="text-align:center" >Edit Account Info</h4>
            </div>
            <div class="panel-body">
            <form method="post" action="{{route('admin.editPatient',$pList[$i]->id)}}">
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
              <input type="text" class="form-control" name="p_name" placeholder="Your Name" value="{{$pList[$i]->p_name}}" data-toggle='tooltip' title='Name'>
              </div>

              <div class="form-group">
                  <input type="email" class="form-control" name="p_email" placeholder="Email Address" value="{{$pList[$i]->p_email}}" data-toggle='tooltip' title='Email Address'>
              </div>

              <div class="form-group">
                  <input type="text" class="form-control" name="p_location" placeholder="Location" value="{{$pList[$i]->p_location}}" data-toggle='tooltip' title='Location'>
              </div>

              <div class="form-group">
                  <input type="text" class="form-control" name="p_phone" placeholder="Phone Number" value="{{$pList[$i]->p_phone}}" data-toggle='tooltip' title='Phone Number'>
              </div>

              <div class="form-group">
                  <input type="text" class="form-control" name="p_age" placeholder="Age" value="{{$pList[$i]->p_age}}" data-toggle='tooltip' title='Age'>
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
  <div class="modal fade" id="myModal-delete-{{$pList[$i]->id}}" role="dialog">
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
                  <h4 style="text-align:center" >Delete Account of <strong>{{$pList[$i]->p_name}}</strong></h4>
              </div>             

              <div class="panel-body">
                <form method='post' action="{{route('admin.deletePatient',$pList[$i]->id)}}">
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

