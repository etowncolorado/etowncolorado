
<template lang="pug">
  div(:class="classes")
    slot
</template>

<script>
  export default {
    props: {
      reversed: Boolean
    },

    computed: {
      classes() {
        return [
          this.$style.module,
          this.reversed && this.$style.reversed
        ]
      }
    }
  }
</script>

<style lang="sass" module>
  .module
    display: flex
    margin-left: -40px
    margin-right: -40px

  .reversed
    flex-direction: row-reverse
</style>
