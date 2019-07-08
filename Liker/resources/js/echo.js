import store from './store'

Echo.channel('posts')
    .listen('PostCreated', (e) => {
        store.dispatch('getPost', e.post.id)
    })
    .listen('PostLiked', (e) => {
        store.dispatch('refreshPost', e.post.id)
    })
