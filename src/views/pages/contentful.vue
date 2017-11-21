
<template lang="pug">
  contentful(:entries="fields && fields.sections")
</template>

<script>
  import Contentful from '../elements/contentful'

  export default {
    components: {
      Contentful
    },

    created() {
      this.fetch(this.$route.params.page)
    },

    watch: {
      '$route'(to, from) {
        if (to.params.page !== from.params.page) {
          this.fetch(to.params.page)
        }
      }
    },

    data() {
      return {
        fields: null
      }
    },

    methods: {
      fetch(slug) {
        this.$screen.menu = false
        this.fields = null

        this.$app('contentful')
          .from('page')
          .load(10)
          .where('slug', slug)
          .first(result => {
            if (!result) {
              return this.fetch(404)
            }

            document.title = `e|town - ${result.fields.title}`

            this.fields = result.fields
          })
      }
    }
  }
</script>
