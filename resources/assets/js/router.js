module.exports = {
    routes: [
      { name:'Home', path: '/', component: require('./components/home.vue')},
      
      /**
      **    Shops routes
      **/
      { name:'Nearby', path: '/nearby', component: require('./components/nearby.vue')},
      { name:'Favorite', path: '/favorite', component: require('./components/favorite.vue')},
    ]
  }
