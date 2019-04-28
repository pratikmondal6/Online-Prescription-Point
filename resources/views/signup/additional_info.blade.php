<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Additional Info</title>
 
 <link rel="stylesheet" href="{{asset('/assets/bootstrap/css/bootstrap.min.css')}}">
 <script src="{{asset('/assets/jquery/jquery.js')}}"></script>
 <script src="{{asset('/assets/bootstrap/js/bootstrap.min.js')}}"></script>

 <style>
  body {
      background: #000;
  }
  
  h2 {
      text-align: center;
      padding: auto;
  }
  
  h3 {
      display: inline;
  }
  
  .well {
      text-align: center;
      border: none;
  }
  
  span {
      float: right;
  }

  .table{
   background-color: #fff;
  }
  .btn{
   width:40%
  }
</style>

</head>
<body>

 <div class="col-sm-12">
  <div class="well">
      <h3>Online Prescription Point</h3>
  </div>
</div>

<div class="container">
 <div class="row">
     <div class=" col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-4 col-md-4 col-md-offset-4">

      <form method="post">
        @csrf
         <table class="table">
          <thead>
           <tr>
            <th><h2 style="text-align: center">Additional Info</h2></th>
           </tr>
          </thead>
          <tbody>
              @if (count($errors) > 0)
              <tr>
              <div class="alert alert-danger">
               <button type="button" class="close" data-dismiss="alert">×</button>
               <ul>
                @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
                @endforeach
               </ul>
              </div>
            </tr>
             @endif
             @if ($message = Session::get('success'))
             <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
                     <strong>{{ $message }}</strong>
             </div>
             @endif
           <tr>
            <td>
             <div class="form-group">
              <label for="">Hospital name:</label>
              <input type="text" class="form-control" name="hospital_name" placeholder="Hospital name." required value="{{old('hospital_name')}}">
             </div>
            </td>
           </tr>
        @if ($type == 'Doctor')
            
           <tr>
            <td>
              <div class="form-group">
                <label for="">Degree:</label>
                <select name="degree" class="form-control">
                  <option value="MBBS">MBBS</option>
                  <option value="MBChB">BMBS</option>
                  <option value="MBChB">MBChB</option>
                 </select>
               </div>
            </td>
           </tr>
        @endif
           <tr>
             <td>
              <div class="form-group">
               <label for="">License number:</label>
               <input type="text" class="form-control" name="lic_no" placeholder="License Number." required value="{{old('lic_no')}}">
              </div>
             </td>
            </tr>
     
           <tr>
            <td>
             <center><button type="submit" class="btn btn-primary">Submit Info</button>
             </center>
            </td>
           </tr>
 
           <tr>
            <td>
             <center><a href="{{route('login.index')}}" class="btn btn-danger">Back</a>
             </center>
            </td>
           </tr>
          </tbody>
         </table>
         </form>
</div>
 </div>
</div>
 </body>
 </html>
