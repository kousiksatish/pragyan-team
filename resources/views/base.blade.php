<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>PRAGYAN '16 TEAM REGISTRATION</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{asset('css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="/" class="brand-logo">PRAGYAN'16</a>
      <ul class="right hide-on-med-and-down">
        @yield('navright')
      </ul>
      <!--
      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a> -->
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">@yield('heading')</h1>
      <div class="row center">
        <h5 class="header col s12 light">@yield('heading-content')</h5>
      </div>
            <br><br>

    </div>
  </div>


  <div class="container">
    <div class="section">

      @yield('content')

    </div>
    <br><br>

    <div class="section">

    </div>
  </div>

  <footer class="page-footer orange">
    <div class="footer-copyright">
      <div class="container">
      <center>
      Made with &hearts; by <a class="orange-text text-lighten-3" href="http://delta.nitt.edu/">Delta Force</a>
      </center>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="{{asset('js/materialize.js')}}"></script>
  <script src="{{asset('js/init.js')}}"></script>
@if (Session::has('message'))
<script>
  Materialize.toast({{ Session::get('message') }}, 4000);
</script>
@endif
  <script>
    $(document).ready(function() {
        $('select').material_select();
    });
    
  </script>
  
  </body>
</html>
