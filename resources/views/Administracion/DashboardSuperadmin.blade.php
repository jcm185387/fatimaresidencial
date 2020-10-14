@extends('layouts.SuperAdminLayout')

@section('content')	
		

      <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-dashboard"></i> Mi Dashboard</b></h5>
        <br>
            			    <!-- !PAGE CONTENT! -->
    	  <span class="alert alert-success"> Hola  {{Auth::user()->name}} bienvenido a Mi Residencia en Línea</span> 
    </header>
    <br>
    <br>
    <div class="w3-row-padding w3-margin-bottom">
        <div class="w3-quarter">
          <div class="w3-container w3-red w3-padding-16">
            <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
            <div class="w3-right">
              <h3>52</h3>
            </div>
            <div class="w3-clear"></div>
            <h4>Avisos</h4>
          </div>
        </div>
        <div class="w3-quarter">
          <div class="w3-container w3-blue w3-padding-16">
            <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
            <div class="w3-right">
              <h3>99</h3>
            </div>
            <div class="w3-clear"></div>
            <h4>Residencias</h4>
          </div>
        </div>
        <div class="w3-quarter">
          <div class="w3-container w3-teal w3-padding-16">
            <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
            <div class="w3-right">
              <h3>23</h3>
            </div>
            <div class="w3-clear"></div>
            <h4>Cuentas de usuario</h4>
          </div>
        </div>
        <div class="w3-quarter">
          <div class="w3-container w3-orange w3-text-white w3-padding-16">
            <div class="w3-left"><i class="fa fa-bell w3-xxxlarge"></i></div>
            <div class="w3-right">
              <h3>50</h3>
            </div>
            <div class="w3-clear"></div>
            <h4>Notificaciones</h4>
          </div>
        </div>
    </div>

    <div class="w3-panel">
        <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-third">
                <h5>Resumen</h5>
                <table class="w3-table w3-striped w3-white">
                    <thead>
                    <td>(+ Ingresos cobrados))</td>
                    <td>(+) Gastos pagados</td>
                    </thead>
                  <tr>
                    <td>(+ Ingresos cobrados))</td>
                    <td><i>10 mins</i></td>
                  </tr>
                  <tr>
                    <td>(+) Gastos pagados</td>
                    <td><i>15 mins</i></td>
                  </tr>              
                </table>
            </div>
            <div class="w3-third">
                <h5>Capital de Trabajo</h5>
                <table class="w3-table w3-striped w3-white">
                    <thead>
                    <td>(+ Ingresos cobrados))</td>
                    <td>(+) Gastos pagados</td>
                    </thead>
                  <tr>
                    <td>(+ Ingresos cobrados))</td>
                    <td><i>10 mins</i></td>
                  </tr>
                  <tr>
                    <td>(+) Gastos pagados</td>
                    <td><i>15 mins</i></td>
                  </tr>              
                </table>
            </div>
        </div>
@endsection