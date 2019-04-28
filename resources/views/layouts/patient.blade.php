<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>@yield('title')</title>

         <!-- Bootstrap CSS file -->
        <link rel="stylesheet" href="{{asset('/assets/bootstrap/css/bootstrap.min.css')}}">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{asset('/css/sidebarStyle.css')}}">
        @yield('styleSection')
    </head>
    <body>

        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3 data-toggle="tooltip" title="Online Prescription Point">Online Pr. Point</h3>
                    <strong>OPP</strong>
                </div>

                <ul class="list-unstyled components">
                    <li @yield('ah')>
                        <a href="{{route('patient.index')}}">
                            <i class="glyphicon glyphicon-home"></i>
                            Home
                        </a>
                    </li>

                    <li @yield('aep')>
                        <a href="{{route('patient.edit',[session('user')->id])}}">
                            <i class="glyphicon glyphicon-edit"></i>
                            Edit Profile
                        </a>
                    </li>

                    <li @yield('avp')>
                        <a href="{{route('patient.show',[session('user')->id])}}">
                            <i class="glyphicon glyphicon-info-sign"></i>
                            View Prescription
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

              <nav class="navbar navbar-default">
                  <div class="container-fluid">

                      <div class="navbar-header">
                          <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                              <i class="glyphicon glyphicon-align-left"></i>
                              <span>Toggle Sidebar</span>
                          </button>

                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                  </button>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{{route('logout.index')}}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                            </ul>
                        </div>
                    
                  </div>


              </nav>
         
              <div class="container-fluid">
                    <div class="row">
                       @yield('customBody')
                    </div>
                </div>
        

            </div>
        </div>


        <!-- jQuery file -->
         <script src="{{asset('/assets/jquery/jquery.js')}}"></script>
         <!-- Bootstrap Js file -->
         <script src="{{asset('/assets/bootstrap/js/bootstrap.min.js')}}"></script>

         <script type="text/javascript">
             $(document).ready(function () {

                $('[data-toggle="tooltip"]').tooltip({ placement: 'auto top' });

                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                     if($(window).width()<768){
                     $('#content').css('min-width','100%');
                     }else if($(window).width()>768){
                      $('#content').css('max-width','80%');
                     }
                 });

                 window.onresize = function(){
                  if($(window).width()<768){
                     $('#content').css('min-width','100%');
                     
                     }else{
                      $('#content').css('min-width','80%');
                     }
                 }
             });
         </script>
    </body>
</html>
