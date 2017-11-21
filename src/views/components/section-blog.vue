
<template lang="pug">
  section-post(v-if="post", :fields="post.fields")
  section(v-else, :class="$style.module")
    container(row)
      module(:class="$style.post", v-for="post in posts", :key="post.sys.id")
        post-preview(:fields="post.fields", plain)
</template>

<script>
  import PostPreview from './post-preview'
  import SectionPost from './section-post'

  export default {
    components: {
      PostPreview,
      SectionPost
    },

    props: ['fields'],

    data() {
      return {
        post: null,
        posts: []
      }
    },

    created() {
      if (this.$route.query.post) {
        this.$app('contentful')
          .from('post')
          .where('slug', this.$route.query.post)
          .load(10)
          .first(result => {
            this.post = result
          })
      } else {
        this.$app('contentful')
          .from('post')
          .load(10)
          .get(result => {
            this.posts = this.posts.concat(result.items)
          })
      }
    }
  }
</script>

<style lang="sass" module>
  @import '~styles/core'

  .module
    +prop (padding-top, large 60px)
    +prop (padding-bottom, large 68px)

  .post:nth-child(odd)
    +prop (padding-left, large 40px)
</style>
