<template>
	<div class="modal fade" id="addResidente" role="dialog" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Agregar Residente</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div class="modal-body">

	      	<form @submit.prevent="saveResidente" enctype="multipart/form-data">
	      		<div class="container jumbotron">
	      						  	<div class="form-group">
				    <label>Calle:</label>
				    <input type="text" class="form-control" placeholder="Ingresa el nombre de la calle" v-model="Datos.Direccion.Calle">
			  	</div>
			  	<div class="form-inline form-group">
			  			<label class="mr-sm-3">Número:</label>
				    	<input type="text" class="form-control mb-3 mr-sm-3" placeholder="Número de calle" v-model="Datos.Direccion.Numero">
			  		
			  		
					    <label class="mr-sm-3">Teléfono</label>
					    <input type="text" class="form-control mb-3 mr-sm-3" placeholder="Ingresa un número de contacto" v-model="Datos.Direccion.Telefono">
			  		
			  	</div>
			  	<div class="form-group">
				    <label>Nombre del Residente</label>
				    <input type="text" class="form-control" placeholder="Nombre del habitante de la casa" v-model="Datos.Usuario.name">

			  	</div>
			  	<div class="form-group">
				    <label>Correo electrónico</label>
				    <input type="text" class="form-control" placeholder="Correo para iniciar sesión" v-model="Datos.Usuario.email">

			  	</div>
			  	<div class="form-group">
			  		<span class="text-primary">Se generará una contraseña genérica "query" que el usuario podrá cambiar desde su perfil</span>	
			  	</div>
			  	<div class="form-group">
				  <label for="sel1">Elige un rol para este usuario:</label>
				  <select class="form-control" id="sel1" v-model="selected" >
				  	<option disabled value="">Por favor, seleccione una opción:</option>
				    <option  v-for="rol in roles" v-bind:value="rol">
				    	{{rol.NombreRol}}
				    </option>			    
				  </select>
				</div>
				<br>
				<br>
			  	<button type="submit" class="btn btn-primary">Save</button>
	      		</div>

			  	
		  	</form>
	      </div>
	    </div>	    
	  </div>
	</div>
</template>
<script>
	import EventBus from '../../event-bus';
	export default{
		data(){
			return{
				selected:'',
				Datos :{
					Direccion:{
						Calle:null,
						Numero:null
					},
					Usuario:{
						name:null,
						email:null,
						Rol: null
					}
				},
				roles:[],
			}
		},	
        mounted(){
        	axios
        		.get('http://127.0.0.1:8000/rolesnoAdministradores')
        		.then((res) => {
        			this.roles  = res.data
        		})
        },
		methods:{
            saveResidente: function(){
            	this.Datos.Usuario.Rol = this.selected;
            	console.log(this.loading);
				axios.post('http://127.0.0.1:8000/residentes', {
					DatosObject: this.Datos

				})
				.then(function(res){
					$('#addResidente').modal('hide');
					EventBus.$emit('residente-added', res.data.residencias);
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