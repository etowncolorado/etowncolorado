
<template lang="pug">
  img(:class="$style.module", :src="src", :alt="alt", :width="width", :height="height")
</template>

<script>
  export default {
    props: ['fields'],

    computed: {
      image() {
        return this.fields[this.viewport].fields
      },

      src() {
        return `https:${this.image.file.url}`
      },

      alt() {
        return (
          this.image.description ||
          this.image.title ||
          this.image.file.fileName
        )
      },

      small() {
        return this.get('small') || this.get('medium') || this.get('large')
      },

      medium() {
        return this.get('medium') || this.get('large') || this.get('small')
      },

      large() {
        return this.get('large') || this.get('medium') || this.get('small')
      },

      width() {
        return this.image.file.details.image.width
      },

      height() {
        return this.image.file.details.image.height
      },

      viewport() {
        return this[this.$screen.viewport]
      }
    },

    methods: {
      get(viewport) {
        return this.fields[viewport] && viewport
      }
    }
  }
</script>

<style lang="sass" module>
  .module
    width: auto
</style>
