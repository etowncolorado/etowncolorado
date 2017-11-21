
<template lang="pug">
  div(:class="classes")
    div(v-if="row", :class="[$style.row, reversed && $style.reversed]")
      slot
    template(v-else)
      slot
</template>

<script>
  export default {
    props: {
      row: Boolean,
      flex: Boolean,
      align: Boolean,
      justify: Boolean,
      reversed: Boolean
    },

    computed: {
      classes() {
        return [
          this.$style.module,
          this.flex && this.$style.flex,
          this.align && this.$style.align,
          this.justify && this.$style.justify,
          this.reversed && this.$style.reversed
        ]
      }
    }
  }
</script>

<style lang="sass" module>
  @import '~styles/core'

  .module
    +prop (max-width, medium 400px, large 904px)
    +prop (padding, small 0 20px, medium 0 20px, large 0 30px)
    margin-left: auto
    margin-right: auto

  .row
    +prop (flex-direction, small column, large row)
    +prop (margin-left, small 0, large -40px)
    +prop (margin-right, small 0, large -40px)
    display: flex
    flex-wrap: wrap

  .reversed
    +prop (flex-direction, small column-reverse, large row-reverse)

  .flex
    display: flex

  .align
    display: flex
    align-items: center

  .justify
    display: flex
    justify-content: center
</style>
