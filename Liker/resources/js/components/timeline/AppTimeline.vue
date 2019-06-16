<template>
    <div>
        <app-timeline-create></app-timeline-create>

        <div class="timeline__posts">
            <app-timeline-post
                v-for="x in 10"
                :key="x"
                />
        </div>
    </div>
</template>

<script>
    export default {

    }
</script>

<style>
    .timeline__posts {
        margin-top: 40px;
    }
</style>
