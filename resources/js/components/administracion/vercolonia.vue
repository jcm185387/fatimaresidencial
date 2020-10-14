<template>
	<div>
		<spinner v-show ="loading"></spinner>
		<div class="content">
			<h3>Configuración</h3>
			<span>Información de la colonia y configuración del sistema</span>
			<br>
			<br>
			<div class="btn-group pull-left " style="margin-top: 50px;margin-bottom: 50px;">
				<button class="btn btn-primary btn-lg" v-show="bloqueo" v-on:click="Editar">Editar</button>
				<button class="btn btn-danger btn-lg" v-show="!bloqueo" v-on:click="CancelarEditar">Cancelar</button>
				<button class="btn btn-success btn-lg" v-show="!bloqueo" v-on:click="ActualizardatosColonia">Guardar</button>
			</div>
			<div class="jumbotron table-responsive" style="background-color: white;margin-top: 50px;margin-bottom: 100px;">
				<strong class="pull-left">Información de la colonia</strong>

				<table class="table" style="margin-top: 50px;">
					<thead>
						<th>Nombre de la Colonia</th>
						<th>Dirección</th>
						<th>Teléfono</th>						
						<th>Correo de la colonia</th>
					</thead>
					<tbody>
						<tr>
							<td>
								<input type="text" class="form-control" v-model="datosColonia.NombreColonia":disabled="bloqueo" placeholder="Nombre de la colonia">
							</td>
							<td>
								<input type="text" class="form-control" v-model="datosColonia.Direccion":disabled="bloqueo" placeholder="Dirección">
							</td>
							<td>
								<input type="text" class="form-control" v-model="datosColonia.Telefono":disabled="bloqueo" placeholder="Teléfono">
							</td>
							<td>
								<input type="text" class="form-control" v-model="datosColonia.email_colonia" :disabled="bloqueo" placeholder="Correo electrónico de la colonia">
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
					<table class="table" style="margin-top: 50px;">
						<thead>
							<th>Cambiar estatus</th>
							<th>Estatus Actual</th>
						</thead>
						<tbody>
							<tr>
								<td>
									<label v-show="datosColonia.enviocorreo != undefined || !bloqueo" class="checkbox-inline">
										<input :disabled="bloqueo" v-model="datosColonia.enviocorreo" type="checkbox" value="">{{GetMovimientoEnvioCorreo(datosColonia.enviocorreo)}}</label>
									<span class="alert alert-danger" v-show="datosColonia.enviocorreo == undefined && bloqueo">Da click en editar</span>
								</td>
								<td>
									<span v-show="datosColonia.enviocorreo != undefined" v-bind:class="{ 'btn btn-primary': datosColonia.enviocorreo, 'btn btn-danger': !datosColonia.enviocorreo  }">{{GetEstatusEnvioCorreo(datosColonia.enviocorreo)}}</span>
								</td>
							</tr>
						</tbody>					
					</table>
				</div>
				<div class="jumbotron table-responsive" style="float: right;background-color: white;width: 48%">
					<strong class="pull-left">Aportación mensual</strong>
					<table class="table" style="margin-top: 50px;">
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
			<div  style="margin-top: 500px;">
				<div class="jumbotron table-responsive" style="float: left;background-color: white;width: 48%">
					<p><strong class="pull-left">Logo de la colonia</strong></p>
					<br>
					<br>
					<div class="form-group">
				    	<label for="exampleFormControlFile1"><strong>Cambiar el logo</strong></label>				    
						<div class="input-group">
						    <input :disabled="bloqueo" type="file" v-on:change="onImageChange" class="form-control" id="exampleFormControlFile1">
						</div>
				  	</div>
					<div class="container">
						<img v-bind:src="'/images/' + datosColonia.Logo" class="img-rounded" alt="Cinque Terre" width="304" height="236"> 
						
					</div>
				</div>
				<div class="jumbotron table-responsive" style="float: right;background-color: white;width: 48%">
					<strong class="pull-left">Cambiar la contraseña</strong>
					<table class="table" style="margin-top: 50px;">
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
	    		.get('http://127.0.0.1:8000/ConfiguracionColonia')
	    		.then((res) => {
	    			this.datosColonia  = res.data;
	    			this.loading = false;
	    			this.datosColonia.enviocorreo = this.datosColonia.enviocorreo == 1 ? true : false;
	    		});
        	},
        	Editar :function(){
        		this.bloqueo = !this.bloqueo;
        	},
        	CancelarEditar :function(){
        		this.bloqueo = !this.bloqueo;
        	},/*
        	GetEstatus:function(data){
        		return data == 1 ? true : false;
        	},*/
        	GetEstatusEnvioCorreo:function(data){
        		return data == true ? 'Activo' : 'Inactivo';
        	},
        	GetMovimientoEnvioCorreo:function(data){
        		return data == undefined ? '	Activar' : data == false ? '	Activar' : '	Inactivar';
        	},       	
        	ActualizardatosColonia :function(){
        		let currentObj = this;
            	const config = {
            	 	headers: { 'content-type': 'multipart/form-data'}
            	}
            	let formData = new FormData();
            	formData.append('Logo', this.image);
            	formData.append('NombreColonia', this.datosColonia.NombreColonia);
            	formData.append('Direccion', this.datosColonia.Direccion);
            	formData.append('Telefono', this.datosColonia.Telefono);
            	//formData.append('Logo', this.image);
            	formData.append('AportacionMensual', this.datosColonia.AportacionMensual);
            	formData.append('email_colonia', this.datosColonia.email_colonia);
            	formData.append('enviocorreo', this.datosColonia.enviocorreo);
        		this.bloqueo = !this.bloqueo;
				axios.post('http://127.0.0.1:8000/ActualizardatosColonia', formData, config)
				.then((response) => {
					console.log(this.datosColonia);
					console.log(response.data.datoscolonia);
					this.datosColonia = response.data.datoscolonia;
				})
				.catch(function(err){
					console.log(err)
				});
        	}
		}
	}
</script>
<style>
	
</style>