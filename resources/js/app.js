/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


Vue.component('list-of-pokemons', require('./components/pokemons/list.vue').default);
Vue.component('modal-button', require('./components/pokemons/modal-button.vue').default);
Vue.component('create-form-pokemon', require('./components/pokemons/add.vue').default);
Vue.component('spinner', require('./components/widgets/Spinner.vue').default);


// componentes residencia
Vue.component('modal-buttonaddresidencia', require('./components/residencias/modal-buttonaddresidencia.vue').default);
Vue.component('list-of-residencias', require('./components/residencias/list.vue').default);
Vue.component('create-form-residencia', require('./components/residencias/add.vue').default);

// componentes residencia
Vue.component('modal-buttonaddresidente', require('./components/residentes/modal-buttonaddresidente.vue').default);
Vue.component('list-of-residentes', require('./components/residentes/list.vue').default);
Vue.component('create-form-residente', require('./components/residentes/add.vue').default);

// componentes Administración
Vue.component('vercolonia', require('./components/administracion/vercolonia.vue').default);
Vue.component('verlogocolonia', require('./components/administracion/verLogoColonia.vue').default);
// Vue.component('list-of-residencias', require('./components/residencias/list.vue').default);
// Vue.component('create-form-residencia', require('./components/residencias/add.vue').default);


//Vue.component('accesscontrol', require('./components/controldeaccesos/list.vue').default);
Vue.component('controldeaccesos', require('./components/controldeaccesos/controldeaccesos.vue').default);

//Componentes de pagos
Vue.component('modal-buttonaddpagos', require('./components/pagos/modal-button.vue').default);
Vue.component('create-form-pago', require('./components/pagos/add.vue').default);
Vue.component('list-of-pagos', require('./components/pagos/list.vue').default);


Vue.component('midatepicker', require('./components/commons/mydatepicker.vue').default);
Vue.component('infocolonia', require('./components/administracion/infoColonia.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
