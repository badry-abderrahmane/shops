
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuetify from 'vuetify'
import VueRouter from 'vue-router';
import { store } from './store';

Vue.use(Vuetify)
Vue.use(VueRouter);

window.Event = new Vue();

import { routes } from './router.js';
const router = new VueRouter({ routes });
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('shops-app', require('./components/home.vue'));

const app = new Vue({
  store,
  router,
  mounted(){
    this.$store.dispatch('LOAD_SHOPS_LIST')
    this.$store.dispatch('LOAD_FAVORITE_LIST')
  },
  created(){
    Event.$on('publish-success-message', (message) => {
      this.notifSuccess(message);
    });
  },
  methods:{
    /**
    * Notif Functions
    *
    **/
    notifSuccess(message){
      $.toast().reset('all');
  		$("body").removeAttr('class');
  		$.toast({
              heading: message,
              text: '',
              position: 'top-right',
              loaderBg:'#fec107',
              icon: 'success',
              hideAfter: 3500,
              stack: 6
            });
  		return false;
    }
  }
}).$mount('#app');
