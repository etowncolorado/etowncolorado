
<template lang="pug">
  div(:class="$style.module", v-if="image && visible")
    img(:src="url")
</template>

<script>
  export default {
    props: {
      image: String,
      visible: Boolean
    },

    computed: {
      url () {
        return `/static/layouts/${this.image}_${this.$screen.viewport}.png`
      }
    },

    mounted () {
      this.$app('keyboard').on('keyup:enter', this.toggle)
    },

    beforeDestroy () {
      this.$app('keyboard').off('keyup:enter', this.toggle)
    },

    methods: {
      toggle() {
        this.$emit('update:visible', !this.visible)
      }
    }
  }
</script>

<style lang="sass" module>
  .module
    top: 0
    left: 0
    right: 0
    height: 800vh
    opacity: 0.3
    z-index: 100000
    position: absolute
    overflow: hidden
    pointer-events: none
    img
      left: 50%
      position: absolute
      transform: translateX(-50%)

</style>
