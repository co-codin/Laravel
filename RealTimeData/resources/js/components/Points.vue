<template>
    <span>
        {{ points }}
    </span>
</template>

<script>
    export default {
        data () {
            return {
                points: this.initialPoints
            }
        },

        props: {
            initialPoints: {
                required: true,
                type: String
            },

            userId: {
                required: true,
                type: Number
            }
        },

        mounted () {
            Echo.private(`users.${this.userId}`)
                .listen('.points-given', (e) => {
                    this.points = e.user_points.shorthand
                })
        }
    }
</script>
