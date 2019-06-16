import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
      comments: []
  },

  getters: {
      comments (state) {
          return state.comments.filter((c) => {
              return c.parent_id === null
          })
      },
  },

  mutations: {
      SET_COMMENTS (state, comments) {
          state.comments = comments
      }
  },

  actions: {
      async getComments ({ commit }) {
          let response = await axios.get('http://datanesting.test/api/comments')

          commit('SET_COMMENTS', response.data.data)
      }
  }
})