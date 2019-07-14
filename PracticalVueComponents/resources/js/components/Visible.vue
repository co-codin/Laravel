<template>
    <transition name="fade">
        <div>
            <slot></slot>
        </div>
    </transition>
</template>

<script>
    export default {
        props: ['whenHidden']
    }
</script>
