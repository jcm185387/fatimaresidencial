<template>
	<div>
		<spinner v-show ="loading"></spinner>
		
		<table class="table table-hover" id="example">
		    <thead>
		      <tr>
		        <th>Calle</th>
		        <th>Numero</th>
		        <th>Residente</th>
		        <th>Acciones</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr v-for="residencia in residencias">
		        <td>{{residencia.Calle}}</td>
		        <td>{{residencia.Numero}}</td>
		        <td>{{residencia.usuario.name}}</td>
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
	
		<!--
        <datatable :columns="columns" :data="residencias"></datatable>
        <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>
    -->
  		
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
/*				columns: [
                    {label: 'Calle', field: 'Calle'}, 
                    {label: 'Número', field: 'Numero'},
                    {label: 'Residente', field: 'usuario.name'},
                    {label: 'Opciones', representedAs: function(row){
                		return '<div class="btn-group">' +
                					'<button class="btn btn-primary">Editar</button>' +
                					'<button class="btn btn-danger">Eliminar</button>' +
                				'</div>'
            }, interpolate: true}
                ],*/
				residencias:[],
				loading: true,
              	//rows: [],
                //page: 1,
                //per_page: 50,
			}
		},
		created(){
			EventBus.$on('residencia-added', data =>{				
				this.residencias.push(data);
				//console.log(this.residencias);
			})
		},
	     mounted() {
            console.log('Component mounted.')
            let currentRoute = window.location.pathname
            	axios
            		.get('http://127.0.0.1:8000/residencias')
            		.then((res) => {
            			this.residencias  = res.data
            			this.mytable();
            			this.loading = false
            		})
            		//console.log(this.residencias);
        },
        methods:{
        	mytable(){
        			$(function(){
        				$('#example').DataTable();
        			});
        	}
        }
	}
</script>