<template>
	<div>
		<spinner v-show ="loading"></spinner>
		
		<table class="table table-hover" id="example">
		    <thead>
		      <tr>
		        <th>Calle</th>
		        <th>Numero</th>
		        <th>Telefono</th>
		        <th>Residente</th>		
		        <th>Correo</th>     
		        <th>Rol</th>   
		        <th>Acciones</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr v-for="residencia in residencias">
		        <td>{{residencia.Calle}}</td>
		        <td>{{residencia.Numero}}</td>
		        <td>{{residencia.telefono}}</td>
		        <td>{{residencia.usuario.name}}</td>
		        <td>{{residencia.usuario.email}}</td>
		        <td>
		        	<ul>
		        		<li v-for="rol in residencia.usuario.roles" >
		        			{{rol.NombreRol}}
		        		</li>
		        	</ul>
		        	
		        </td>
		        <td>
		        	<div class="button-group">
		        		<div class="btn btn-primary">
		        			Editar
		        		</div>
		        		<div class="btn btn-danger">
		        			Eliminar
		        		</div>
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
				residencias:[],
				loading: true,
			}
		},
		created(){
			EventBus.$on('residente-added', data =>{				
				//this.residencias.push(data);
				this.residencias = data;
			})
		},
	     mounted() {
            console.log('Component mounted.')            
            this.getResidentes()
        },
        methods:{
        	mytable(){
        			$(function(){
        				$('#example').DataTable();
        			});
        	},
        	getResidentes(){
        			axios
            		.get('http://127.0.0.1:8000/residentes')
            		.then((res) => {
            			this.residencias  = res.data;
            			this.mytable();
            			this.loading = false
            		});
        	}
        }
	}
</script>