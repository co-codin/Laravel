<template>
    <div>
        <app-timeline-create></app-timeline-create>

        <div class="timeline__posts">
            <app-timeline-post
                v-for="post in posts"
                :post="post"
                :key="post.id"
                />
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data () {
            return {
                posts: []
            }
        },

        methods: {
            async getPosts () {
                let posts = await axios.get('/api/posts')

                this.posts = posts.data.data
            }
        },

        mounted () {
            this.getPosts()
        }
    }
</script>

<style>
    .timeline__posts {
        margin-top: 40px;
    }
</style>
