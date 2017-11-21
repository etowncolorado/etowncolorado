
<template lang="pug">
  img(:src="url", :width="width", :height="height")
</template>

<script>
  export default {
    props: ['fields'],

    computed: {
      url() {
        return `https:${this.fields.file.url}`
      },

      width() {
        return this.fields.file.details.image.width / 2
      },

      height() {
        return this.fields.file.details.image.height / 2
      }
    }
  }
</script>

<style lang="sass" module>
  .module
</style>
