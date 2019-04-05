<template>
  <div>
      <TopNav />
      <nuxt />
  </div>
</template>

<script>
    import TopNav from './partials/TopNav'

    export default {
        components: {
            TopNav
        }
    }
</script>
