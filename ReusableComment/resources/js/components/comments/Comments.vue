<template>
    <div>
        <new-comment :endpoint="endpoint" />
    </div>
</template>

<script>
    import NewComment from './NewComment'

    export default {
        props: {
            endpoint: {
                required: true,
                type: String
            }
        },

        components: {
            NewComment
        },

        created () {
            console.log(this.endpoint)
        }
    }
</script>
