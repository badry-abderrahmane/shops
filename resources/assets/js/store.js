
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
  state: {
    shops: [],
    favorites: [],
  },
  mutations: {

  },
  actions: {
    LOAD_SHOPS_LIST: function ({ commit }) {
      // axios.get('list/prospects').then((response) => {
      //   commit('SET_PROSPECT_LIST', { list: response.data })
      // }, (err) => {
      //   console.log(err)
      // })
    },

    LOAD_FAVORITE_LIST: function ({ commit }) {
      // axios.get('list/fournisseurs').then((response) => {
      //   commit('SET_FOURNISSEUR_LIST', { list: response.data })
      // }, (err) => {
      //   console.log(err)
      // })
    },
  }
});
