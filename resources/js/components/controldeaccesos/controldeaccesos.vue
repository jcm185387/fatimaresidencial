<template>
  <ul class="list-group" @click="isShow = !isShow">
   <li class="list-group-item">Control de accesos</li>

    <transition name="slide">
      <ul v-if="isShow">
         <li class="list-group-item"><a href="/Administracion/ConfiguracionColonia">Mis empleados</a></li>
         <li class="list-group-item">Autorización de accesos</li>
         <li class="list-group-item">Historial de accesos</li>
      </ul>
   </transition>
  </ul>
</template>  
<script>
  export default{
    data(){
      return{
          isShow:false        
      }
    }
  }
</script> 
<style>
  ul {
       cursor: pointer;
    }

    .slide-enter-active {
       -moz-transition-duration: 0.3s;
       -webkit-transition-duration: 0.3s;
       -o-transition-duration: 0.3s;
       transition-duration: 0.3s;
       -moz-transition-timing-function: ease-in;
       -webkit-transition-timing-function: ease-in;
       -o-transition-timing-function: ease-in;
       transition-timing-function: ease-in;
    }

    .slide-leave-active {
       -moz-transition-duration: 0.3s;
       -webkit-transition-duration: 0.3s;
       -o-transition-duration: 0.3s;
       transition-duration: 0.3s;
       -moz-transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
       -webkit-transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
       -o-transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
       transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
    }

    .slide-enter-to, .slide-leave {
       max-height: 100px;
       overflow: hidden;
    }

    .slide-enter, .slide-leave-to {
       overflow: hidden;
       max-height: 0;
    }
</style>  