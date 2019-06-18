import Vuex from 'vuex'
import Vue from 'vue'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        posts: []
    },

    getters: {
        posts (state) {
            return state.posts
        }
    },

    mutations: {
        SET_POSTS (state, posts) {
            state.posts = posts
        },

        UPDATE_POST (state, post) {
            state.posts = state.posts.map(p => {
                if (p.id === post.id) {
                    return post
                }

                return p
            })
        },

        PREPEND_POSTS (state, post) {
            let posts = state.posts.slice()
            posts.unshift(post)

            state.posts = posts
        }
    },

    actions: {
        async getPosts ({ commit }) {
            let posts = await axios.get('/api/posts')

            commit('SET_POSTS', posts.data.data)
        },

        async createPost ({ commit }, data) {
            let post = await axios.post('/api/posts', data)

            commit('PREPEND_POSTS', post.data.data)
        },

        async likePost ({ commit }, id) {
            let post = await axios.post(`/api/posts/${id}/likes`)

            commit('UPDATE_POST', post.data.data)
        }
    }
})
