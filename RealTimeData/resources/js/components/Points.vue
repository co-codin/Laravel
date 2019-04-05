<template>
    <span>10</span>
</template>

<script>
    export default {
        props: {
            userId: {
                required: true,
                type: Number
            }
        },

        mounted () {
            Echo.private(`users.${this.userId}`)
                .listen('.points-given', (e) => {
                    console.log(e);
                })
        }
    }
</script>
