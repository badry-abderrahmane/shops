
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
  state: {
    shops: [],
    favorites: [],
  },
  mutations: {
    SET_SHOPS_LIST: (state, { list }) => {
      state.shops = list
    },
    SET_FAVORITES_LIST: (state, { list }) => {
      state.favorites = list
    },
  },

  actions: {
    LOAD_SHOPS_LIST: function ({ commit }) {
      axios.get('shops/nearby').then((response) => {
        commit('SET_SHOPS_LIST', { list: response.data })
      }, (err) => {
        console.log(err)
      })
    },

    LOAD_FAVORITES_LIST: function ({ commit }) {
      axios.get('shops/favorite').then((response) => {
        commit('SET_FAVORITES_LIST', { list: response.data })
      }, (err) => {
        console.log(err)
      })
    },
  }
});

export default store
