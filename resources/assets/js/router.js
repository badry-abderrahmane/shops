import Vue from 'vue'
import VueRouter from 'vue-router'
import store from './store.js'

Vue.use(VueRouter)

//define routes
const routes = [
      { path: '/', component: require('./components/home.vue'),
          children: [
            /**
            **    Welcome Route
            **/
            { name:'Welcome', path: '', component: require('./components/welcome.vue')},
            /**
            **    Shops routes
            **/
            { name:'Nearby', path: '/nearby', component: require('./components/nearby.vue')},
            { name:'Favorite', path: '/favorite', component: require('./components/favorite.vue')},
          ],
      },
      { path: '/auth', component: require('./components/auth/home.vue'),
          children: [
            /**
            **    Auth routes
            **/
            { name:'Login', path: 'login', component: require('./components/auth/login.vue')},
            { name:'Register', path: 'register', component: require('./components/auth/register.vue')},
          ],
      },
    ]


  export const router = new VueRouter({ routes });

  router.beforeEach((to, from, next) => {
      if (to.name != 'Login' && to.name != 'Register') {
          axios.get('/islogged')
            .then(response => {
              if (response.data) {
                store.dispatch('LOAD_SHOPS_LIST')
                store.dispatch('LOAD_FAVORITES_LIST')
                next();
              }
              else{ next({ path: '/auth/login' }); }
          });
      }else{
        next();
      }
  })

  export default router
