
<template lang="pug">
  section(:class="$style.module")
    container(row)
      module(:class="$style.post", v-for="post in fields.posts", :key="post.sys.id")
        post-preview(:fields="post.fields", plain)
</template>

<script>
  import PostPreview from './post-preview'

  export default {
    components: { PostPreview },

    props: ['fields']
  }
</script>

<style lang="sass" module>
  @import '~styles/core'

  .module
    +prop (padding-top, large 54px)
    +prop (padding-bottom, large 70px)

  .post:nth-child(odd)
    +prop (padding-left, large 40px)
</style>
