<template>
    <div>
        <h3 class="mb-5">{{ meta.total }} comments</h3>
        <new-comment
                :endpoint="endpoint"
                />
        <template v-if="comments.length">
            <ul class="list-unstyled">
                <comment v-for="comment in comments" :key="comment.id" :comment="comment" />
            </ul>
        </template>
        <p class="mt-4" v-else>
            No comments to display
        </p>
    </div>
</template>

<script>
    import bus from '../../bus'
    import NewComment from './NewComment'
    import Comment from './Comment'
    import axios from 'axios'

    export default {
        props: {
            endpoint: {
                required: true,
                type: String
            }
        },

        data () {
            return {
                comments: [],
                meta: []
            }
        },

        components: {
            NewComment, Comment
        },

        mounted () {
            this.loadComments(1)

            bus.$on('comment:stored', this.prependComment)
        },

        methods: {
            async loadComments (page = 1) {
                let comments = await axios.get(`${this.endpoint}?page=${page}`)

                this.comments = comments.data.data
                this.meta = comments.data.meta
            },

            prependComment (comment) {
                console.log(comment);
            }
        }
    }
</script>
