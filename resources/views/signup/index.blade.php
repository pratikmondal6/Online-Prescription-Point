<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/assets/bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('/assets/jquery/jquery.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{asset('/jQueryUI/jquery-ui.min.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('/jQueryUI/jquery-ui.structure.min.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('/jQueryUI/jquery-ui.theme.min.css')}}" media="all">
    <script type="text/javascript" src="{{asset('/jQueryUI/jquery-ui.min.js')}}"></script>


    <script type="text/javascript" src="{{asset('/js/registration.js')}}"></script>

<style>
    body {
        background: #000;
    }
    
    .panel {
        margin-top: 3%;
        background: #fff;
    }
    
    h2 {
        text-align: center;
        padding: auto;
    }
    
    #submit {
        float: right;
        width: 50%
    }
    
    a {
        float: right;
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

            <div class="col-sm-5 col-sm-offset-4 col-md-4 col-md-offset-4">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Create an Account</h2>
                    </div>

                    <div class="panel-body">
                        
                        
                            @if ($message = Session::get('success'))
                            <div style="background:#fff" class="alert alert-success alert-block form-group">
                             <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                            </div>
                            @endif

                        <form class="form" method="POST">
                            @csrf

                            <div class="row">
                                <div class="form-group col-xs-6">
                                    <input type="text" name="f_name" class="form-control" placeholder="Firstname" data-toggle="tooltip" title="Enter firstname">
                                    <span id="f_error"></span>
                                </div>
                                <div class="form-group col-xs-6">
                                    <input type="text" name="l_name" class="form-control" placeholder="Lastname" data-toggle="tooltip" title="Enter lastname">
                                    <span id="l_error"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email Address" data-toggle="tooltip" title="Enter mail-address">
                                <span id="e_error"></span>
                            </div>

                            <div class="form-group">
                                <select class="form-control" data-toggle="tooltip" title="Who you are?" name="type">
                                    <option value="Pharmacy">Pharmacy</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="password" name="pass" class="form-control" placeholder="Password" data-toggle="tooltip" title="Enter password">
                                <span id="p_error"></span>
                            </div>
                            <div class="form-group">
                                <input type="password" name="c_pass" class="form-control" placeholder="Confirm password" data-toggle="tooltip" title="Re-enter password">
                                <span id="cp_error"></span>
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="gender" data-toggle="tooltip" title="Select gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" name="dob" id="datePicker" class="form-control" placeholder="Date of Birth" data-toggle="tooltip" title="Enter date of birth..Format: YYYY-MM-DD">
                                <span id="dob_error"></span>
                            </div>


                            <div class="form-group">
                                <select class="form-control" name="location" data-toggle="tooltip" title="Select location">
                                    <option value="Banani">Banani</option>
                                    <option value="Khilkhet">Khilkhet</option>
                                    <option value="Kuril">Kuril</option>
                                    <option value="Airport">Airport</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-xs-7">
                                        <button type="submit" id="submit" style="border-radius:30px" class="btn btn-success" data-toggle="tooltip" title="Click to signup">Register</button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <a href="/login" data-toggle="tooltip" title="Back to login">Have an account?</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>


        </div>

    </div>

</body>
<script src="{{asset('/assets/bootstrap/js/bootstrap.min.js')}}"></script>
</html>