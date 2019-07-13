<template>
    <div class="dropdown relative">
        <div class="dropdown-trigger"
             aria-haspopup="true"
        >
            <slot name="trigger"></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['classes'],


    }
</script>

<style>
    .pop-out-quick-enter-active,
    .pop-out-quick-leave-active {
        transition: all 0.4s;
    }
    .pop-out-quick-enter,
    .pop-out-quick-leave-active {
        opacity: 0;
        transform: translateY(-7px);
    }
</style>
