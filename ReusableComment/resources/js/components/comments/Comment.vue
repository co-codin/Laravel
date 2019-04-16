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

        </div>
    </li>
</template>

<script>
    export default {
        props: {
            comment: {
                required: true,
                type: Object
            }
        }
    }
</script>
