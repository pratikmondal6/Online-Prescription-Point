<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <script src="/assets/jquery/jquery.js"></script>


    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip({
                placement: "auto top"
            });

        var error_email = true;
        var error_pass = true;
        var error_cpass = true;
        var error_emailExist = true;
        
        $('input[name="email"]').keyup(function() {
        var value = $('input[name="email"]').val();
        $.ajax({
            type: 'GET',
            url: "/register/ajax/" + value,
            success: function(result) {
                if (result.length != '') {
                    error_emailExist = true;
                    $('#e_error').html("");
                } else {
                    error_emailExist = false;
                    $('#e_error').html('*Invalid email address')
                        .css({ 'color': 'red' });
                }
            }
        });
    });
            $('input[name="email"]').focusout(function() {
                 validateEmail();
            });

    function validateEmail() {
        var em = $('input[name="email"]').val();
        if ($.trim(em) == "") {
            error_email = false;
            $('#e_error').html('*Email is required')
                .css({ 'color': 'red' });
        } else {
            if(error_emailExist){
            error_email = true;
            $('#e_error').html("");
            }
        }
        return error_email;
    }

    $('input[name="pass"]').focusout(function() {
        validatePassword();
    });

    function validatePassword() {
        var p = $('input[name="pass"]').val();
        if ($.trim(p) == "") {
            error_pass = false;
            $('#p_error').html('*Password is required')
                .css({ 'color': 'red' });
        } else {
            error_pass = true;
            $('#p_error').html("");
        }
        return error_pass;
    }


    $('input[name="c_pass"]').focusout(function() {
        validateConfirmPassword();
    });

    function validateConfirmPassword() {
        var cpass = $('input[name="c_pass"]').val();
        if ($.trim(cpass) == "") {
            error_cpass = false;
            $('#cp_error').html('*Confirm password is required')
                .css({ 'color': 'red' });
        } else {
            error_cpass = true;
            $('#cp_error').html("");
            error_cpass = checkPassword();
        }
        return error_cpass;
    }

    function checkPassword() {
        var pass = $('input[name="pass"]').val();
        var cpass = $('input[name="c_pass"]').val();
        if (pass != cpass) {
            error_cpass = false;
            $('#cp_error').html("Password miss-matched");
        } else {
            error_cpass = true;
            $('#cp_error').html("");
            if (pass.length < 4) {
                error_cpass = false;
                $('#cp_error').html("Password length less than 4");
            }
        }
        return error_cpass;
    }


    $('button[type="submit"]').click(function() {
        var error_e = validateEmail();
        var error_p = validatePassword();
        var error_cp = validateConfirmPassword();

        if (error_e && error_p && error_cp && error_emailExist) {
            return true;
        } else {
            return false;
        }
        });
    });
    </script>
<style>
    body {
        overflow-x: hidden;
        background: #000
    }
    
    .main-content {
        width: 50%;
        height: 40px;
        margin: 10px auto;
    }
    
    .panel {
        height: 80px;
        border: 0px solid #000;
        margin-bottom: 5px;
        padding-top: 1%;
        text-align: center
    }
    
    .h3 {
        display: inline;
    }
    
    .well {
        text-align: center;
        border: none;
    }
    
    #signup {
        width: 40%;
        border-radius: 30px;
    }
    span{
        margin-left: 60%
    }

    .main{
        background-color: #fff
    }
</style>
</head>
<body>
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <label class="h3">Online Prescription Point</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <div class="main-content">
                <div class="panel panel-default">
                    <h3> <strong>Change Password</strong></h3>
                </div>
                <hr>
                @if ($message = Session::get('success'))
                <div style="background:#fff" class="alert alert-success alert-block">
                 <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="l_pass">
                    <form method="post">
                        @csrf
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input class="form-control" type="email" name="email" data-toggle="tooltip" title="Enter your registered Email" placeholder="Email Address" required>
                        </div> <span id="e_error"></span><br>
                        
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input class="form-control" type="password" name="pass" placeholder="New Password" data-toggle="tooltip" title="Enter new password" required>
                        </div><span id="p_error"></span><br>
                        
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" name="c_pass" placeholder="Re-enter Password" data-toggle="tooltip" title="Re-type the password" required>
                        </div><span id="cp_error"></span>
                        <hr>
                        <center>
                                <button id="signup" type="submit" class="btn btn-info btn-lg" name="change" data-toggle="tooltip" title="Click to chenge">Save</button>
                                </br>
                                </br>
                                <a id="signup" href="{{route('login.index')}}" class="btn btn-danger btn-lg" data-toggle="tooltip" title="Back to login">Back </a>
                            </center>
                    </form>
            </div>
        </div>
    </div>
</body>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
</html>