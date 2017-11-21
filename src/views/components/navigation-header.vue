
<template lang="pug">
  nav(:class="$style.module")
    container(:class="$style.container", row)
      module(:class="$style.left")
        hyperlink(:class="$style.logo", :fields="fields.logo.fields")
      module(:class="$style.right", fill)
        div(:class="$style.item", v-for="entry in fields.links")
          hyperlink(:class="$style.link", :fields="entry.fields")
</template>

<script>
  export default {
    props: ['fields']
  }
</script>

<style lang="sass" module>
  @import '~styles/core'

  .module
    +prop (padding-top, small 30px, large 48px)
    +prop (padding-bottom, small 0, large 4px)

  .logo img
    +prop (height, small 46px, large 54px)
    +prop (margin-left, large -30px)

  .item
    display: flex
    align-items: center

  .link
    +typography (sans, large 13 32 bold 1.5px)
    position: relative
    &:global(.router-link-active)
      &:after
        left: 0
        right: 2px
        bottom: 2px
        height: 2px
        content: ' '
        position: absolute
        background: swatch(poppy)

  .left
    +prop (text-align, small center, medium left)

  .right
    +prop (display, small none !important, large flex !important)
</style>
