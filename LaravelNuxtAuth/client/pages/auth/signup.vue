<template>
  <section class="hero">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="column is-4 is-offset-4">
          <h1 class="title has-text-grey">Join us</h1>
          <div class="box">
            <form method="" @submit.prevent="submit">
              <div class="field">
                <div class="control">
                  <label for="email" class="label">Email address</label>
                  <input class="input is-large" :class="{ 'is-danger': errors.email }" type="email" id="email" placeholder="e.g. billy@codecourse.com" autofocus="" v-model="form.email">

                  <p class="help is-danger" v-if="errors.email">
                    {{ errors.email[0] }}
                  </p>
                </div>
              </div>

              <div class="field">
                <div class="control">
                  <label for="name" class="label">Full name</label>
                  <input class="input is-large" :class="{ 'is-danger': errors.name }" type="text" id="name" autofocus="" v-model="form.name">

                  <p class="help is-danger" v-if="errors.name">
                    {{ errors.name[0] }}
                  </p>
                </div>
              </div>

              <div class="field">
                <div class="control">
                  <label for="password" class="label">Choose a password</label>
                  <input class="input is-large" :class="{ 'is-danger': errors.password }" id="password" type="password" v-model="form.password">

                  <p class="help is-danger" v-if="errors.password">
                    {{ errors.password[0] }}
                  </p>
                </div>
              </div>
              <button class="button is-block is-info is-large is-fullwidth">Sign up</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    middleware: 'guest',
    data () {
      return {
        form: {
          email: '',
          name: '',
          password: ''
        }
      }
    },
    methods: {
      async submit () {
        await this.$axios.post('register', this.form)

        await this.$auth.login({
          data: {
            email: this.form.email,
            password: this.form.password
          }
        })

        this.$router.push({
          name: 'index'
        })
      }
    }
  }
</script>
