<template>
  <nav class="navbar is-light" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <nuxt-link :to="{ name: 'index' }" class="navbar-item">
        <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
      </nuxt-link>

      <div class="navbar-burger">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>

    {{ loggedIn }}

    <div class="navbar-end">

        <div class="navbar-item">
          <div class="field is-grouped">
            <p class="control">
              <nuxt-link :to="{ name: 'auth-signin' }" class="button is-text">
                Sign in
              </nuxt-link>
            </p>

            <p class="control">
              <nuxt-link :to="{ name: 'auth-signup' }" href="#" class="button is-info">
                Sign up
              </nuxt-link>
            </p>
          </div>
        </div>
    </div>
  </nav>
</template>

<script>
    import { mapGetters } from 'vuex'

    export default {
        computed: {
            ...mapGetters({
                loggedIn: 'auth/authenticated'
            })
        }
    }
</script>
