<template>
    <div class="timeline__post media">
        <img src="" class="timeline__avatar mr-3 rounded">

        <div class="media-body">
            <div class="font-weight-bold">
                User
            </div>
            <p>
                body
            </p>

            <app-timeline-post-likes></app-timeline-post-likes>
        </div>
    </div>
</template>

<script>
    export default {

    }
</script>

<style>
    .timeline__post {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .timeline__avatar {
        width: 60px;
    }
</style>
