<template>
    <article class="media">
    <figure class="media-left">
      <p class="image is-64x64">
        <img src="https://bulma.io/images/placeholders/128x128.png">
      </p>
    </figure>
    <div class="media-content">
      <div class="content">
        <p>
          <strong>user name</strong>
          <br>
          <strong>1</strong> comment
        </p>
      </div>

      <nav class="level is-mobile">
        <div class="level-left">
          <a class="level-item">
            Reply
          </a>
          <a class="level-item">
            Edit
          </a>
          <a class="level-item">
            Delete
          </a>
        </div>
      </nav>

    </div>
  </article>
</template>

<script>
    export default {
        name: 'AppComment'
    }
</script>
