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
            <p>
                {{ comment.body }}
            </p>

            <ul class="list-inline" v-if="links">
                <li class="list-inline-item" v-if="!comment.child">
                    <a href="#" @click.prevent="reply">Reply</a>
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
            Comment
        },

        methods: {
            reply () {
                bus.$emit('comment:reply', this.comment)
            }
        }
    }
</script>
