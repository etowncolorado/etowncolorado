
<template lang="pug">
  router-link(v-if="fields.label", :class="$style.label", :to="href") {{ fields.label }}
  a(v-else, :class="$style.image", :href="href")
    images(:fields="fields.image.fields")
</template>

<script>
  export default {
    props: ['fields'],

    computed: {
      type() {
        return this.fields
      },

      href() {
        return this.normalize(this.url)
      },

      url() {
        if (!this.fields.reference) {
          return this.fields.url
        }

        const type = this.fields.reference.sys.contentType.sys.id
        const fields = this.fields.reference.fields

        if (type === 'page') {
          return `/${fields.slug}`
        }
      }
    },

    methods: {
      normalize(url) {
        return url
      }
    }
  }
</script>

<style lang="sass" module>
  .label
  .image
    line-height: 0
</style>
