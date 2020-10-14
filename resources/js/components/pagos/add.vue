<template>
	<div class="modal fade" id="addPago" role="dialog" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Agregar Pago</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<form @submit.prevent="savePago">
		        <div class="form-group">
				    <label>Cantidad a pagar</label>
				    <input type="text" class="form-control" disabled="" v-model="Pago.Cantidaddepago">
			  	</div>
			  	<div class="form-group">
				    <label>Descripción</label>
				    <textarea class="form-control" placeholder="Descripción" v-model="Pago.descripcion">
				    	
				    </textarea>
			  	</div>
			  	<div class="form-group">
				  <label for="sel1">Elige el mes a pagar:</label>
				  <select class="form-control" id="mes" v-model="Pago.Mes" >
				  	<option disabled value="">Por favor, seleccione una opción:</option>
				    <option  v-for="mes in payedmonths" v-bind:value="mes">
				    	{{mes.Mes}}
				    </option>			    
				  </select>
				</div>
			  	<div class="form-group">
				  <label for="sel1">Elige el tipo de pago:</label>
				  <select class="form-control" id="tipodepago" v-model="Pago.TipodePago" >
				  	<option disabled value="">Por favor, seleccione una opción:</option>
				    <option  v-for="tipopago in tiposdepago" v-bind:value="tipopago">
				    	{{tipopago.nombre}}
				    </option>			    
				  </select>
				</div>
			  	<div class="form-group">
				  <label for="sel1">Elige la fecha de pago:</label>
					<!--<midatepicker placeholder="Elige una fecha" @selected="fechaSeleccionada" :inline="true"></midatepicker>-->
					<midatepicker></midatepicker>
				</div>
				<div class="form-group">
				    <label for="exampleFormControlFile1">Adjunta tu comprobante</label>				    
					<div class="input-group">
						<input type="file" v-on:change="onImageChange" class="form-control" id="exampleFormControlFile1">
					</div>
				</div>
				<div class="container">
<!-- 					<img v-bind:src="'/images/' + Pago.Comprobante de pago" class="img-rounded" alt="Cinque Terre" width="304" height="236">  -->
						
				</div>

			  	<button type="submit" class="btn btn-primary">Guardar</button>
		  	</form>
	      </div>
	    </div>
	  </div>
	</div>
</template>
<script>	
	import EventBus from '../../event-bus';
	//import Datepicker from 'vuejs-datepicker';
	function initialState (){
		return{			
			meses :[],
			//Cantidaddepago : 200,
			Pago:{
				Cantidaddepago: 200,
				descripcion: null,
				Fechadepago:'',
				Mes : '',
				TipodePago: ''
			},
			mesespagados: null,
			payedmonths:null,
			todoslosmeses:null,
			tiposdepago:'',
			fechaainsertar:''
		}
	}

	export default{
/*		data(){
			return{
				meses :[],
				Cantidaddepago : 200,
				Pago:{
					descripcion: null,
					Fechadepago:'',
					Mes : '',
					TipodePago: ''
				},
				mesespagados: null,
				payedmonths:null,
				todoslosmeses:null,
				tiposdepago:'',
				fechaainsertar:''
			}
		},*/
		data: function (){
		    return initialState();
		},
        mounted(){
        	//console.log(this.meses);
        	//después de crear el objeto de meses 
        	//obtener los que se han pagado y omitir estos para construir de nuevo el objeto de meses
        	EventBus.$on('pagosrecibidos', data =>{				
				this.mesespagados = data; // son los meses que vienen de la tabla de pagos
				EventBus.$on('todoslosmeses', data2 =>{				
					this.todoslosmeses = data2;
					this.payedmonths = this.getmesespagados(this.mesespagados,this.todoslosmeses);// se buscan todos los meses dentro de los meses pagados y se construye un nuevo objeto para llenar el select de meses a pagar
					console.log(this.payedmonths);
				});
			});	
			EventBus.$on('tiposdepago', data =>{				
				this.tiposdepago = data;
			});	
			EventBus.$on('fecha-seleccionada', data =>{								
				this.Pago.Fechadepago = data;
			});			        

        },
		methods:{
			onImageChange(e){
                this.image = e.target.files[0];  
            },
			resetWindow: function (){
        		Object.assign(this.$data, initialState());
    		},
			savePago: function(event){
				let currentObj = this;
            	const config = {
            	 	headers: { 'content-type': 'multipart/form-data'}
            	}
            	let formData = new FormData();
            	formData.append('Cantidaddepago', this.Pago.Cantidaddepago);
            	formData.append('Descripcion', this.Pago.descripcion);
            	formData.append('Mes', this.Pago.Mes);
            	
/*            	formData.append('Telefono', this.datosColonia.Telefono);
            	//formData.append('Logo', this.image);
            	formData.append('AportacionMensual', this.datosColonia.AportacionMensual);
            	formData.append('email_colonia', this.datosColonia.email_colonia);
            	formData.append('enviocorreo', this.datosColonia.enviocorreo);
        		this.bloqueo = !this.bloqueo;*/


				axios.post('http://127.0.0.1:8000/Mispagos',{
					PagoObject : this.Pago
				})
				.then(function(res){
					$('#addPago').modal('hide');
					EventBus.$emit('pago-added', res.data.todoslospagos);
/*					resetWindow();
					console.log(PagoObject);*/
					//event.target.reset();
					//return;
/*		        	EventBus.$on('pagosrecibidos', data =>{				
						this.mesespagados = data; // son los meses que vienen de la tabla de pagos
						EventBus.$on('todoslosmeses', data2 =>{				
							this.todoslosmeses = data2;
							this.payedmonths = this.getmesespagados(this.mesespagados,this.todoslosmeses);// se buscan todos los meses dentro de los meses pagados y se construye un nuevo objeto para llenar el select de meses a pagar
							console.log(this.payedmonths);
						});
					});	
					EventBus.$on('tiposdepago', data =>{				
						this.tiposdepago = data;
					});	
					EventBus.$on('fecha-seleccionada', data =>{								
						this.Pago.Fechadepago = data;
					});	*/




				})
				.catch(function(err){
					console.log(err)
				});
			},
			getmesespagados: function(pagados,todoslosmeses){	
				//console.log(data);
				if(pagados.length == 0){
					return todoslosmeses;
				}else{
					var Objeto = [];
					$.each(todoslosmeses, function(key, value) {
						var object = [];
						var bandera = 0;
						$.each(pagados, function(key2, value2) {					
				   			if(value.id === value2.mespagado.id){//si el id del mes no es igual al mes pagado entra
				   				var cadena = value2.Fechadepago; //fecha que viene
				   				var fecha = new Date();
								var ano = fecha.getFullYear();//año actual
								//alert(ano);
								var anostring = ano.toString();//convierte el año en string

								var posicion = cadena.indexOf(anostring);//si la fecha de pago tiene el año
								//si no lo tiene devolverá un -1
								if(posicion === 0){
									object.push(value); //son los pagos de este año
				   					bandera = 1;
								}							
				   			}
				   		});
/*				   		if(bandera === 1){*/
							//console.log(object);
							var encontrado = object.indexOf(value);
							if(encontrado === -1){
								Objeto.push(value);
							}
/*				   		}*/
				   });
					//console.log(Objeto);
					return Objeto;
				}
			}/*,
			fechaSeleccionada: function() {
      		  console.log('Una fecha ha sido seleccionada');
    		},*/

			/*,
			getTiposdePago: function(){
				 axios
        		.get('http://127.0.0.1:8000/ObtenerMesesnoPagados')//Debe obtener todos los meses no pagados de este año(validar si se puede buscar en años anteriores)
        		.then((res) => {
        			this.mesespagados  = res.data
        		})
			}*/

		}
	}
</script>
<style>
	
</style>