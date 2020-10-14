<template>
	<div>
		<spinner v-show ="loading"></spinner>
		<div class="content">
			<h3>Configuración</h3>
			<span>Información de la colonia y configuración del sistema</span>
			<br>
			<br>
			<div class="jumbotron table-responsive" style="background-color: white;margin-top: 50px;margin-bottom: 100px;">
				<strong class="pull-left">Información de la colonia</strong>

				<table class="table" style="margin-top: 50px;background-color: #007350;color:white !important">
					<thead>
						<th>Nombre de la Colonia</th>
						<th>Dirección</th>
						<th>Teléfono</th>						
						<th>Correo de la colonia</th>
					</thead>
					<tbody>
						<tr>
							<td>
								<span class="form-control">{{datosColonia.NombreColonia}}</span>
							</td>
							<td>
								<span class="form-control">{{datosColonia.Direccion}}</span>
							</td>
							<td>
								<span class="form-control">{{datosColonia.Telefono}}</span>
							</td>
							<td>
								<span class="form-control">{{datosColonia.email_colonia}}</span>
							</td>
						</tr>
					</tbody>					
				</table>
			</div>
			<div  style="margin-top: 100px;">
				<div class="jumbotron table-responsive" style="float: left;background-color: white;width: 48%">
					<strong class="pull-left">Configuración del sistema</strong>
					<br>
					<strong class="pull-left">Envío de correo</strong>
					<table class="table" style="margin-top: 50px;background-color: #007350;color:white !important">
						<thead>
							<th>Estatus Actual</th>
						</thead>
						<tbody>
							<tr>
								<td>
									<span v-show="datosColonia.enviocorreo != undefined" v-bind:class="{ 'btn btn-primary': datosColonia.enviocorreo, 'btn btn-danger': !datosColonia.enviocorreo  }">{{GetEstatusEnvioCorreo(datosColonia.enviocorreo)}}</span>
								</td>
							</tr>
						</tbody>					
					</table>
				</div>
				<div class="jumbotron table-responsive" style="float: right;background-color: white;width: 48%">
					<strong class="pull-left">Aportación mensual</strong>
					<table class="table" style="margin-top: 50px;background-color: #007350;color:white !important">
						<thead>
							<th>Monto</th>
						</thead>
						<tbody>
							<tr>
								<td>
								  <div class="input-group">
									<span class="form-control">{{datosColonia.AportacionMensual}}</span>
								  </div>
								</td>
							</tr>
						</tbody>					
					</table>
				</div>
			</div>
			<div  style="margin-top: 500px;">
				<div class="jumbotron table-responsive" style="float: left;background-color: white;width: 48%">
					<p><strong class="pull-left">Logo de la colonia</strong></p>
					<br>
					<br>

					<div class="container">
						<img v-bind:src="'/images/' + datosColonia.Logo" class="img-rounded" alt="Cinque Terre" width="304" height="236"> 
						
					</div>
				</div>
				<div class="jumbotron table-responsive" style="float: right;background-color: white;width: 48%">
					<strong class="pull-left">Cambiar la contraseña</strong>
					<table class="table" style="margin-top: 50px;background-color: #007350;color:white !important">
						<thead>
							<th>Monto</th>
						</thead>
						<tbody>
							<tr>
								<td>
								  <div class="input-group">
								    <input type="text" class="form-control" v-model="datosColonia.AportacionMensual":disabled="bloqueo" placeholder="Captura el monto a cobrar como mensualidad">
								  </div>
								</td>
							</tr>
						</tbody>					
					</table>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	export default{
		data(){
			return{
				loading: true,
				datosColonia: '',
				bloqueo:true
			}
		},
		mounted(){
			this.getDatosColonia();
		},
		methods:{
			onImageChange(e){
                this.image = e.target.files[0];  
            },
			getDatosColonia(){
				axios
	    		.get('http://127.0.0.1:8000/GetDatosColonia')
	    		.then((res) => {
	    			this.datosColonia  = res.data;
	    			this.loading = false;
	    		});
        	},
        	Editar :function(){
        		this.bloqueo = !this.bloqueo;
        	},
        	CancelarEditar :function(){
        		this.bloqueo = !this.bloqueo;
        	},
        	GetEstatusEnvioCorreo:function(data){
        		return data == true ? 'Activo' : 'Inactivo';
        	}
        	      	

		}
	}
</script>
<style>
	
</style>