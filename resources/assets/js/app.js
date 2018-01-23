
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

// Include Vutify
import Vuetify from 'vuetify'

// Include the Store
import { store } from './store';

// Attach vutify to the vue instance
Vue.use(Vuetify)

// Include the Router
import { router } from './router.js';

// Initiate the app root component
Vue.component('shops-app', require('./components/home.vue'));

const app = new Vue({
  // Attach the Store Instance
  store,
  // Attach the Router Instance
  router,
}).$mount('#app');
