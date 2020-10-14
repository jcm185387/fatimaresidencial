<template>
	<div>
		<datepicker v-model="Fecha" :format="customFormatter" :language="es" @selected="fechaSeleccionada"></datepicker>
		{{formatfecha}}
	</div>
</template>
<script>
	import EventBus from '../../event-bus';
	import Datepicker from 'vuejs-datepicker';
	import moment from 'moment';
	import {en, es} from 'vuejs-datepicker/dist/locale'
	export default {
  		// ...
  		data(){
  			return {
  				Fecha: '',
  				formatfecha: '',
			    en: en,
			    es: es			
  			}
  		},
  		components: {
    		Datepicker
	  	},
	  	mounted(){
			$(".vdp-datepicker div input").addClass("form-control");
	  	},
	  	methods:{
			fechaSeleccionada: function() {				
  		  		//EventBus.$emit('fecha-seleccionada', this.Fecha);
  		  		this.formatfecha =this.customFormatter();
  		  		EventBus.$emit('fecha-seleccionada', this.formatfecha);
			},
			customFormatter(date) {
			      //return moment(date).format('MMMM Do YYYY, h:mm:ss a');
			      return moment(date).format('YYYY-MM-DD');
			},
			moment: function () {
			    return moment();
			}
			/*,
			customFormatter(date) {
			      return moment(date).format('MMMM Do YYYY, h:mm:ss a');
			}*/
	  	}
	  // ...
	}
</script>
<style>
	.vdp-datepicker div input{
		/*display: none;*/
	}

</style>