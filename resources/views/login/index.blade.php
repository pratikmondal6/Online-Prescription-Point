<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <script src="/assets/jquery/jquery.js"></script>
    
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">

    <script>
    $(document).ready(function(){
             $('[data-toggle="tooltip"]').tooltip({placement: "auto top"});

            var error_email = true;
            var error_pass = true;

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
            error_email = true;
            $('#e_error').html("");
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

    $('input[type="submit"]').click(function() {
        var error_e = validateEmail();
        var error_p = validatePassword();


        if (error_e == true && error_p == true) {
            return true;
        } else {
            return false;
        }
    });
        });
    </script>
</head>
    <body>
        <div class="col-sm-12">
            <div class="well">
                <h3>Online Prescription Point</h3>
            </div>
        </div>

        <div class="loginbox">
            <img src="avatar.png" class="avatar">
            <h1>Login</h1>

            @if ($message = Session::get('success'))
            <div class="alert alert-danger alert-block">
             <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
            @endif

            <form method="POST">
                @csrf
                <p>UserMail</p>
                <input type="email" name="email" data-toggle="tooltip" title="Enter your email" placeholder="Email Address">
                <span id="e_error"></span>
                
                <p>Password</p>
                <input type="password" name="pass" data-toggle="tooltip" title="Enter your password" placeholder="Password">
                <span id="p_error"></span>
                
                <input type="submit" value="Login" data-toggle="tooltip" title="Click to login">
                
                <a id="back" data-toggle="tooltip" title="Back to landing page" class="btn btn-danger" href="/">Back</a><br>
                
            <a class="ancor" data-toggle="tooltip" title="Change your password" href="{{route('forgotPassword.index')}}">Lost your password?</a><br>
                
                <a class="ancor" data-toggle="tooltip" title="Go to signup page" href="{{route('signup.index')}}">Don't have an account?</a>
            </form>

        </div>

    </body>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
</html>