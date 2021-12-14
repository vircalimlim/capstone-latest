/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;


//Including sweet alert
import swal from 'sweetalert2'
window.swal = swal;

const toast = swal.mixin({
    icon: 'success',
    showConfirmButton: false,
    timer: 1500
  });
  window.toast = toast;

//Including vuejs pagination
import JwPagination from 'jw-vue-pagination';
Vue.component('jw-pagination', JwPagination);

import VueHtml2pdf from 'vue-html2pdf';
Vue.component('vue-html2pdf', VueHtml2pdf);


import VueApexCharts from 'vue-apexcharts'
Vue.component('apexchart', VueApexCharts)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

//Vue.component('select-option', require('./components/SelectOption.vue').default);
Vue.component('educ-level', require('./components/EducLevel.vue').default);
Vue.component('create-profile', require('./components/Profile/Create.vue').default);
Vue.component('show-profile', require('./components/Profile/Show.vue').default);
Vue.component('index-profile', require('./components/Profile/Index.vue').default);
Vue.component('info-profile', require('./components/Profile/Info.vue').default);

Vue.component('css-loader', require('./components/Loader.vue').default);

Vue.component('side-bar', require('./components/Sidebar.vue').default);

Vue.component('Report', require('./components/Profile/Report.vue').default);

Vue.component('index-med', require('./components/Medicine/Index.vue').default);

Vue.component('dash-board', require('./components/Dashboard.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
