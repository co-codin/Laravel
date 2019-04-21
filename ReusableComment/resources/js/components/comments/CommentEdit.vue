<template>
    <form @submit.prevent="patch">
        <div class="form-group">
            <textarea
                id="body"
                :rows="textareaHeight"
                class="form-control"
                autofocus="autofocus"
                v-model="form.body"
            ></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="#" @click.prevent="cancel" class="btn btn-link">Cancel</a>
        </div>
    </form>
</template>

<script>
    import bus from '../../bus'
    import axios from 'axios'

    export default {
        props: {
            comment: {
                required: true,
                type: Object
            }
        },

        data () {
            return {
                form: {
                   body: this.comment.body
               }
            }
        },

        methods: {
            async patch () {
                let comment = await axios.patch(`/comments/${this.comment.id}`, this.form)

                bus.$emit('comment:edited', comment.data.data)

                this.cancel()
            },

            cancel () {
                bus.$emit('comment:edit-cancelled', this.comment)
            }
        },

        computed: {
            textareaHeight () {
                return Math.max(Math.floor(this.comment.body.split(/\r*\n/).length / 2), 6)
            }
        }
    }
</script>
