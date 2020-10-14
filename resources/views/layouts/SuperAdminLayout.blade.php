<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<title>Mi residencia en línea</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">
  <div id="app" >
    <!-- Top container -->
    <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
      <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
      <span class="w3-bar-item w3-right">Mi Residencia en Línea</span>
      <span class="w3-bar-item w3-left"><i class="fa fa-calendar"></i>  {{ date('l,d-M-Y') }}</span>
       
    </div>
    
    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
      <div class="w3-container w3-row">
        <div class="w3-col s4">
          <img src="/images/156415918265831675_2293514587406177_3287864303369060352_n.jpg" class="w3-circle w3-margin-right" style="width:46px">
        </div>
        <div class="w3-col s8 w3-bar">
          <span>Bienvenido, <strong><span>{{ Auth::user()->name }}</span><span class="caret"></span></strong></span><br>
          <span>rol: <strong><span>{{ Auth::user()->roles->pluck('NombreRol')[0] }}</span><span class="caret"></span></strong></span><br>
          <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
          <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
          <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
        </div>
      </div>
      <hr>
      <div class="w3-container">
        <h5>Dashboard</h5>
      </div>
      <div class="w3-bar-block">
        <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
        <a href="{{ url('/DashboardSuperadmin') }}"  class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  General</a>
        <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>	Cuentas de Usuario</a>
        <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-comments fa-fw"></i>  Avisos</a>
        <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-money fa-fw"></i>  Ingresos</a>
        <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-money fa-fw"></i>  Egresos</a>
        <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-file fa-fw"></i>  Documentos</a>
        <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  Notificaciones</a>        
        <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Configuración</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"
          class="w3-bar-item w3-button w3-padding">
            <i class="fa fa-power-off fa-fw"></i>  Cerrar sesión
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <br><br>
      </div>
    </nav>


    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay">
      
    </div>

    <div class="w3-container w3-padding-16 w3-light-grey" style="margin-left:300px;margin-top:43px;">
      <main>
          @yield('content')
      </main>
            <!-- Footer -->
      <footer class="w3-container w3-padding-16 w3-light-grey">
          <p>Mi residencia Online. Todos los derechos reservados</p>
      </footer>
    </div>

    <!-- End page content -->

  </div>
<script>
  // Get the Sidebar
  var mySidebar = document.getElementById("mySidebar");

  // Get the DIV with overlay effect
  var overlayBg = document.getElementById("myOverlay");

  // Toggle between showing and hiding the sidebar, and add overlay effect
  function w3_open() {
    if (mySidebar.style.display === 'block') {
      mySidebar.style.display = 'none';
      overlayBg.style.display = "none";
    } else {
      mySidebar.style.display = 'block';
      overlayBg.style.display = "block";
    }
  }

  // Close the sidebar with the close button
  function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
  }
</script>

</body>
</html>
	