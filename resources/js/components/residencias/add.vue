<template>
	<div class="modal fade" id="addResidencia" role="dialog" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Agregar Residencia</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div class="modal-body">

	      	<form @submit.prevent="saveResidencia" enctype="multipart/form-data">
			  	<div class="form-group">
				    <label>Calle</label>
				    <input type="text" class="form-control" placeholder="Ingresa calle" v-model="Calle">
			  	</div>
			  	<div class="form-group">
				    <label>Número</label>
				    <input type="text" class="form-control" placeholder="Ingresa el número" v-model="Numero">

			  	</div>
				<div class="form-group">
				  <label for="sel1">Select el nombre del residente:</label>
				  <select class="form-control" id="sel1" v-model="selected" >
				  	<option disabled value="">Por favor, seleccione una opción:</option>
				    <option  v-for="residente in residentes" v-bind:value="residente">
				    	{{residente.name}}
				    </option>			    
				  </select>
				</div>
			  	<button type="submit" class="btn btn-primary">Save</button>
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
					
					Calle:null,
					Numero:null,					
					residentes:[],
					selected : '',
					Residente: null
			}
		},	
        mounted(){
        	axios
        		.get('http://127.0.0.1:8000/usuariosporRol',{
        			params:{
        				NombreRol : 'Residente'
        			}
        		})
        		.then((res) => {
        			this.residentes  = res.data
        			//console.log(this.residentes);
        		})
        		//console.log(this.residentes);
        },
		methods:{
            saveResidencia: function(){
            	//console.log(this.Calle);
            	//console.log(this.selected);
            	//let currentRoute = window.location.pathname
				axios.post(`http://127.0.0.1:8000/residencias`, {
					Calle: this.Calle,
					Numero: this.Numero,
					Residente: this.selected

				})
				.then(function(res){
					$('#addResidencia').modal('hide');
		/*			console.log(res.data.residencia);*/
					EventBus.$emit('residencia-added', res.data.residencia);
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