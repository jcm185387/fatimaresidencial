<template>
	<div style="text-align: center;">
		<spinner v-show ="loading"></spinner>
		<!-- <div style="text-align: center;"> -->
			<img style="padding: 10px;" v-bind:src="'/images/' + datosColonia.Logo" class="img-rounded" alt="Cinque Terre" width="304" height="236"> 
			<br>		
			<kbd style="margin: auto;">{{datosColonia.NombreColonia}}</kbd>								
		</div>
	</div>
</template>
<script>
	export default{
		data(){
			return{
				loading: true,
				datosColonia: ''
			}
		},
		mounted(){
			this.getDatosColonia();
		},
		methods:{
			getDatosColonia(){
				axios
	    		.get('http://127.0.0.1:8000/GetDatosColonia')
	    		.then((res) => {
	    			this.datosColonia  = res.data;
	    			this.loading = false;
	    		});
        	}
		}
	}
</script>
<style>
	
</style>