<template>
    <div class="app container">
        <AppComments
          :comments="comments"
        />
    </div>
</template>

<script>
    import AppComments from '@/components/comments/AppComments'

    export default {
        components: {
            AppComments
        },

        mounted () {
            
        }
    }
</script>

<style lang="scss">
    .app {
        padding: 40px 0;
    }
</style>
