
<template lang="pug">
  div(:class="classes")
    slot
</template>

<script>
  export default {
    props: {
      flex: Boolean,
      fill: Boolean,
      align: Boolean,
      strong: Boolean,
      gapless: Boolean
    },

    computed: {
      classes() {
        return [
          this.$style.module, 
          this.flex && this.$style.flex, 
          this.fill && this.$style.fill, 
          this.strong && this.$style.strong, 
          this.align && this.$style.align,
          this.gapless && this.$style.gapless
        ]
      }
    }
  }
</script>

<style lang="sass" module>
  @import "~styles/core"

  .module
    +prop (width, large 382px)
    +prop (flex, small 1, medium initial)
    +prop (margin-left, large 40px)
    +prop (margin-right, large 40px)
    // margin-left: 40px
    // margin-right: 40px
    // &:first-child
    //   margin-right: 40px
    // &:last-child:not(:first-child)
    //   margin-left: 40px

  .flex
    display: flex

  .fill
    display: flex
    justify-content: space-between

  .strong
    +prop (width, large 462px)
    margin-right: 0

  .strong + .module
    margin-left: 0

  .align
    display: flex
    align-items: center

  .gapless
    +prop (width, large 462px)
    margin: 0
    border: 0
    line-height: 0
    &:last-child:not(:first-child)
      margin-left: 0
</style>
