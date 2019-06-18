<template>
    <div>
        <span class="text-secondary">
            {{ pluralize('like', post.likes, true) }} from {{ pluralize('person', post.likers.data.length, true) }}
            <template v-if="post.user.data.liked">
                (including you)
            </template>
        </span>

        <ul class="list-inline mb-0">
            <li class="list-inline-item" v-if="!post.user.data.owner">
                <a href="#">Like it</a>
            </li>
        </ul>
    </div>
</template>

<script>
    import pluralize from 'pluralize'

    export default {
        props: {
            post: {
                required: true,
                type: Object
            }
        },

        methods: {
            pluralize
        }
    }
</script>
