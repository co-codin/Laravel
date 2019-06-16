<template>
    <div class="app container">
        <AppComments
          :comments="comments"
        />
    </div>
</template>

<script>
    import AppComments from '@/components/comments/AppComments'
    import { mapActions, mapGetters } from 'vuex'

    export default {
        components: {
            AppComments
        },

        methods: {
            ...mapActions({
                getComments: 'getComments'
            })
        },

        computed: {
            ...mapGetters({
                comments: 'comments'
            })
        },

        mounted () {
            this.getComments()
        }
    }
</script>

<style lang="scss">
    .app {
        padding: 40px 0;
    }
</style>
