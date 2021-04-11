/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');  


import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue'
import { SimpleTimelinePlugin } from 'simple-vue-timeline';
import { Vue } from 'vue-property-decorator';
import LightTimeline from 'vue-light-timeline';




window.axios = require('axios');
window.Vue = require('vue').default;
Vue.use(SimpleTimelinePlugin);
Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons);
Vue.use(LightTimeline);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('App', require('./components/App.vue').default);

Vue.component('NavBar', require('./components/NavBar.vue').default);

Vue.component('Content', require('./components/Content.vue').default);

Vue.component('Weather', require('./components/Weather.vue').default);

Vue.component('Alert', require('./components/Alert.vue').default);

Vue.component('Places', require('./components/Places.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
