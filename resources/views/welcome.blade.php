<!DOCTYPE html>
<html>

<head>
    <title>OPP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <script src="/assets/jquery/jquery.js"></script>
</head>
<style>
    body {
        overflow-x: hidden;
        background-color: #000;
    }
    
    #centered1 {
        position: absolute;
        font-size: 10vw;
        top: 30%;
        left: 30%;
        transform: translate(-50%, -50%);
    }
    
    #centered2 {
        position: absolute;
        font-size: 10vw;
        top: 50%;
        left: 35%;
        transform: translate(-50%, -50%);
    }
    
    #centered3 {
        position: absolute;
        font-size: 10vw;
        top: 70%;
        left: 30%;
        transform: translate(-50%, -50%);
    }
    
    #signup {
        width: 60%;
        border-radius: 30px;
        margin-left: 10vw;
    }
    
    #login {
        width: 60%;
        background-color: #fff;
        border: 1px solid #1da1f2;
        color: #1da1f2;
        border-radius: 30px;
        margin-left: 10vw;
    }
    
    #login:hover, #signup:hover {
        width: 60%;
        background-color: #1bba26;
        color: #fff;
        border: 2px solid #1bba26;
        border-radius: 30px;
    }
    
    .well {
        text-align: center;
        border: none;
    }
    
    .h3 {
        display: inline;
    }
    .leftDiv{
        margin-left: 10vw;
        color: #d7cbe1
        }
</style>

<body>
    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <span class="h3">Online Prescription Point</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6" style="left:0.5%;">
            <img src="/assets/images/doctor.jpg" class="img-rounded" title="Online Prescription Point" width="650px" height="565px">
            <div id="centered1" class="centered">
                <h3 ><span class="glyphicon glyphicon-envelope"></span>&nbsp&nbsp<strong>Create an account to join.</strong></h3>
            </div>
            <div id="centered2" class="centered">
                <h3><span class="glyphicon glyphicon-envelope"></span>&nbsp&nbsp<strong>Make life easier and save time.</strong></h3>
            </div>
            <div id="centered3" class="centered">
                <h3><span class="glyphicon glyphicon-envelope"></span>&nbsp&nbsp<strong>Control the prescription.</strong></h3>
            </div>
        </div>
        <div class="col-lg-6" style="left:8%:">
            <img src="/assets/images/doctor.jpg" class="img-circle leftDiv" title="Coding cafe" width="80px" height="80px">
            <h2 class="leftDiv"><strong>See how easily take <br> the treatment right now</strong></h2><br><br>
            <h4 class="leftDiv"><strong>Join OPP Today.</strong></h4>
            <form method="post" action="">
                <a id="signup" class="btn btn-info btn-lg" href="/register" >Sign up</a><br><br>
                <a id="login" class="btn btn-info btn-lg" href="/login" >Login</a><br><br>
            </form>
        </div>
    </div>
</body>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
</html>