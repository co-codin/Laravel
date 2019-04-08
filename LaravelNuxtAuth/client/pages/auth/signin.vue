<template>
  <section class="hero">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="column is-4 is-offset-4">
          <h1 class="title has-text-grey">Sign in</h1>
          <div class="box">
            <form action="#" @submit.prevent="submit">
              <div class="field">
                <div class="control">
                  <label for="email" class="label">Email address</label>
                  <input class="input is-large" type="email" id="email" placeholder="e.g. billy@example.com" autofocus="" v-model="form.email">
                </div>
              </div>

              <div class="field">
                <div class="control">
                  <label for="password" class="label">Password</label>
                  <input class="input is-large" type="password" id="password" v-model="form.password">
                </div>
              </div>
              <button class="button is-block is-info is-large is-fullwidth">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    data () {
      return {
        form: {
          email: '',
          password: ''
        }
      }
    },
    methods: {
      async submit () {
          await this.$auth.login({
              data: this.form
          })

          this.$router.push({
              path: '/'
          })
      }
    }
  }
</script>
