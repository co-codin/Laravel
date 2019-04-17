<template>
    <li class="media mt-4 mb-4" :id="`comment-${comment.id}`">
        <img class="mr-3" :src="comment.user.avatar">
        <div class="media-body">
            <p class="mb-2">
                <strong>{{ comment.user.name }}</strong>
                <template v-if="comment.child">
                    repied
                </template>
                {{ comment.created_at }}
            </p>

            <template v-if="editing">
                <comment-edit :comment="comment" />
            </template>
            <template v-else>
                <p>
                    {{ comment.body }}
                </p>
            </template>

            <ul class="list-inline" v-if="links && user.authenticated && !editing">
                <li class="list-inline-item" v-if="!comment.child">
                    <a href="#" @click.prevent="reply">Reply</a>
                </li>

                <li class="list-inline-item" v-if="comment.owner"> 
                    <a href="#" @click.prevent="editing = true">Edit</a>
                </li>
            </ul>

            <template v-if="comment.children">
                <ul class="list-unstyled">
                    <comment v-for="child in comment.children" :comment="child" :key="child.id" />
                </ul>
            </template>
        </div>
    </li>
</template>

<script>
    import Comment from './Comment'
    import CommentEdit from './CommentEdit'
    import bus from '../../bus'

    export default {
        name: 'comment',
        props: {
            links: {
                default: true,
                type: Boolean
            },

            comment: {
                required: true,
                type: Object
            }
        },

        components: {
            Comment, CommentEdit
        },

        data () {
            return {
                editing: false
            }
        },

        mounted () {
            bus.$on('comment:edit-cancelled', (comment) => {
                if (comment.id === this.comment.id) {
                    this.editing = false
                }
            })
        },

        methods: {
            reply () {
                bus.$emit('comment:reply', this.comment)
            }
        }
    }
</script>
