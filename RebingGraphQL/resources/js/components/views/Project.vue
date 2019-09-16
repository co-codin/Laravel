<template>
  <div class="container">
      <h3>{{project.title}}</h3>
      <p>{{project.description}}</p>
      <br/>
      <br/>
  </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                project: {}
            }
        },

        created () {
            axios.post('/graphql', {
                query: `{
                    projects(projectId: ${this.$route.params.id}) {
                        id,
                        title,
                        description
                    }
                }`
            }).then(res => {
                this.project = res.data.data.projects[0]
            })
        }
    }
</script>
