<template>
    <li class="media mt-4 mb-4">
        <img class="mr-3" :src="comment.user.avatar">
        <div class="media-body">
            <p class="mb-2">
                <strong>{{ comment.user.name }}</strong>
                {{ comment.created_at }}
            </p>
            <p>
                {{ comment.body }}
            </p>

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

    export default {
        name: 'comment',
        props: {
            comment: {
                required: true,
                type: Object
            }
        },

        components: {
            Comment
        }
    }
</script>
