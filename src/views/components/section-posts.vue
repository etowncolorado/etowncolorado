
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
    +prop (padding-top, small 54px)
    +prop (padding-bottom, small 66px, large 70px)

  .post:nth-child(odd)
    +prop (padding-left, large 40px)

  .post + .post
    +viewport (small, large)
      position: relative
      padding-top: 60px
      &:before
        top: 30px
        left: 50%
        width: 46px
        height: 2px
        content: ' '
        position: absolute
        transform: translateX(-50%)
        background: swatch(poppy)

</style>
