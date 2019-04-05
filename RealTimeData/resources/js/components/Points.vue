<template>
    <span>10</span>
</template>

<script>
    export default {
        mounted () {
            Echo.private('users.1')
                .listen('.points-given', (e) => {
                    console.log(e);
                })
        }
    }
</script>
