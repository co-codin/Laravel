<template>
    <button @click="confirm">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        props: {
            message: {},
            confirmButton: { default: 'Continue' },
            cancelButton: { default: 'Cancel' }
        },

        data () {
            return {
                confirmed: false
            }
        },

        methods: {
            
        }
    }
</script>
