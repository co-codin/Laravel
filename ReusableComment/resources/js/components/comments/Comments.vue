<template>
    <div>
        <new-comment
                :endpoint="endpoint"
                />
    </div>
</template>

<script>
    import bus from '../../bus'
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

        mounted () {
            bus.$on('comment:stored', this.prependComment)
        },

        methods: {
            prependComment (comment) {
                console.log(comment);
            }
        }
    }
</script>
