<template>
    <form action="#" @submit.prevent="submit">
        <div class="form-group">
            <label for="body" class="sr-only">Share something</label>
            <textarea
                class="form-control"
                placeholder="Share something"
                rows="3"
                v-model="form.body"
            ></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Post it</button>
    </form>
</template>

<script>
    import { mapActions } from 'vuex'

    export default {
        data () {
            return {
                form: {
                    body: ''
                }
            }
        },

        methods: {
            ...mapActions({
                createPost: 'createPost'
            }),

            async submit () {
                await this.createPost(this.form)
                this.form.body = ''
            }
        }
    }
</script>
