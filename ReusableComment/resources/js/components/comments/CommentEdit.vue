<template>
    <form @submit.prevent="patch">
        <div class="form-group">
            <textarea
                id="body"
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
            patch () {

            }
        }
    }
</script>
