
<template lang="pug">
  hyperlink(:class="[$style.module, dark && $style.dark]", v-bind="$attrs")
    slot
</template>

<script>
  export default {
    props: {
      dark: Boolean
    }
  }
</script>

<style lang="sass" module>
  @import '~styles/core'
  
  .module
    +typography (sans, small 16 2 bold 1px, large 12 2 bold 0.7px)
    +prop (width, small 85%, large auto)
    +prop (height, small 50px, large 40px)
    +prop (padding, small 0 30px)
    +prop (margin-left, small auto, large initial)
    +prop (margin-right, small auto, large initial)
    border: 2px solid swatch(poppy)
    display: flex
    align-items: center;
    border-radius: 0
    justify-content: center

  .dark
    color: swatch(white)
</style>
