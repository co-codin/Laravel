<template>
    <div>
        <AppComment
          v-for="comment in comments"
          :key="comment.id"
          :comment="comment"
        />
    </div>
</template>

<script>
    import AppComment from './AppComment'

    export default {
        components: {
            AppComment
        },

        props: {
            comments: {
                required: true,
                type: Array
            }
        }
    }
</script>
