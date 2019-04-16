<template>
    <div class="mb-5">
        <a href="#"
           class="btn btn-primary btn-block"
           >Post a comment</a>
           <form @submit.prevent="store">
               <div class="form-group">
                   <textarea
                       id="body"
                       rows="10"
                       class="form-control"
                       autofocus="autofocus"
                   ></textarea>

                   <p class="form-text text-muted">Markdown and code highlighting are supported.</p>
               </div>

               <div class="form-group">
                   <button type="submit" class="btn btn-primary">Post</button>
                   <a href="#" class="btn btn-link">Cancel</a>
               </div>
           </form>
    </div>

</template>

<script>
    export default {
        props: {
            endpoint: {
                required: true,
                type: String
            }
        },
    }
</script>
