module.exports = {
    routes: [
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
  }
