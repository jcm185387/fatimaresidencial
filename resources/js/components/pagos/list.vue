<template>
	<div class="table-responsive">
		<spinner v-show ="loading"></spinner>
		
		<table class="table table-hover" id="PagosTable">
		    <thead>
		      <tr>
		        <th>Folio</th>
		        <th>Descripcion</th>
		        <th>Cantidad</th>
		        <th>Mes</th>		
		        <th>Tipo de pago</th>     
		        <th>Fecha de pago</th>   
		        <th>Estatus</th>
		        <th>Fecha de captura</th>
		        <th>Acciones</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr v-for="pago in pagos">
		        <td>{{pago.Folio}}</td>
		        <td>{{pago.Descripcion}}</td>
		        <td>{{pago.Cantidad}}</td>
		        <td>{{pago.mespagado.Mes}}</td>
		        <td>{{pago.tipopago.nombre}}</td>
		        <td>{{pago.Fechadepago}}</td>
		        <td><span v-bind:class="GetClassEstatus(pago.estatus.name)">{{pago.estatus.name}}</span></td>
		        <td>{{pago.created_at}}</td>
		        <td>
<!-- 		        	{{GetClassName(pago.estatus.name,)}} -->
 		        	<div class="button-group">
		        		<button v-on:click="editar(pago.id)" class="btn btn-primary" :disabled="GetDisabled(pago.estatus.name)">
		        			Editar
		        		</button>
		        		<button class="btn btn-danger">
		        			Eliminar
		        		</button>
		        	</div> 
		        </td>
		      </tr>
		    </tbody>
		</table>
	
    </div>
</template>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.2/vue.js" defer></script>
<script src="/dist/vuejs-datatable.js" defer></script>
<script src="/myscript.js" defer></script>
<script>
	import EventBus from '../../event-bus';
/*	import DatatableFactory from 'vuejs-datatable';
	Vue.use(DatatableFactory);*/
	import datatables from 'datatables'
	export default{
		data(){
			return{
				pagos:[],
				loading: true,
			}
		},
		created(){
			EventBus.$on('pago-added', data =>{				
				//this.residencias.push(data);
				this.pagos = data;
				this.mytable();
			});

		},
	     mounted() {
            console.log('Component mounted.')            
            this.getPagos()
            this.getMeses()
            this.getTiposdePago()

        },
        methods:{
        	mytable(){
        			$(function(){
        				$('#PagosTable').DataTable();
        			});
        	},
        	getPagos(){
        			axios
            		.get('http://127.0.0.1:8000/Mispagos')
            		.then((res) => {
            			this.pagos  = res.data;
            			this.mytable();
            			this.loading = false
            			EventBus.$emit('pagosrecibidos', res.data );
            		});
        	},
        	getMeses(){
        			axios
            		.get('http://127.0.0.1:8000/Todoslosmeses')
            		.then((res) => {
            			this.todoslosmeses  = res.data;
            			EventBus.$emit('todoslosmeses', res.data );
            		});
        	}, 
        	GetDisabled:function(data){
        		return data == 'Aprobada' ? true : data == 'Rechazada' ? false : false;
        	}, 
        	getTiposdePago(){
        			axios
            		.get('http://127.0.0.1:8000/ObtenerTiposdePago')
            		.then((res) => {
            			this.tiposdepago  = res.data;
            			EventBus.$emit('tiposdepago', res.data );
            		});
        	},
        	GetClassEstatus:function(data){
        		return data == 'Pendiente' ? 'btn btn-warning' : data == 'Aprobada' ? 'btn btn-success' : 'btn btn-danger';
        	},
        	editar:function(data){
        		alert(data);
        	}
        }
	}
</script>