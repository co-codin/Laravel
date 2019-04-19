<template>
    <div>
        <template v-if="reply">
            <comment-reply :comment="reply" />
        </template>
        <template v-else>
            <h3 class="mb-5">{{ meta.total }} comments</h3>
            <new-comment
                    v-if="user.authenticated"
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

            <a href="#"
               class="btn btn-light btn-block"
               @click.prevent="loadMore"
               v-if="meta.current_page < meta.last_page"
               >
               show more</a>
        </template>
    </div>
</template>

<script>
    import bus from '../../bus'
    import NewComment from './NewComment'
    import Comment from './Comment'
    import CommentReply from './CommentReply'
    import axios from 'axios'
    import VueScrollTo from 'vue-scrollto'


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
                meta: [],
                reply: null
            }
        },

        components: {
            NewComment, Comment, CommentReply
        },

        mounted () {
            this.loadComments(1)

            bus.$on('comment:stored', this.prependComment)
            bus.$on('comment:reply', this.setReplying)
            bus.$on('comment:reply-cancelled', () => this.reply = null)

            bus.$on('comment:replied', ({ comment, reply }) => {
                this.appendReply(comment, reply)
                this.scrollToComment(reply)
            })

            bus.$on('comment:edited', this.editComment)

        },

        methods: {
            async loadComments (page = 1) {
                let comments = await axios.get(`${this.endpoint}?page=${page}`)

                this.comments = comments.data.data
                this.meta = comments.data.meta
            },

            async fetchMeta () {
                let comments = await axios.get(`${this.endpoint}?page=${this.meta.current_page}`)

                this.meta = comments.data.meta
            },

            async loadMore () {
                let comments = await axios.get(`${this.endpoint}?page=${this.meta.current_page + 1}`)

                this.comments.push(...comments.data.data)
                this.meta = comments.data.meta
            },

            async prependComment (comment) {
                this.comments.unshift(comment)

                await this.fetchMeta()

                if (this.meta.current_page < this.meta.last_page) {
                    this.comments.pop()
                }
            },

            appendReply (comment, reply) {
                _.find(this.comments, { id: comment.id }).children.push(reply)
            },

            setReplying (comment) {
                this.reply = comment
            },

            scrollToComment (comment) {
                setTimeout(() => {
                    VueScrollTo.scrollTo(`#comment-${comment.id}`, 500)
                }, 100)
            },

            editComment (comment) {
                _.assign(_.find(this.comments, { id: comment.id }), comment)
            }
        }
    }
</script>
