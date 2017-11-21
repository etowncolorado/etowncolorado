
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
    +viewport (large)
      width: auto
      height: 40px
    +viewport (small, large)
      width: 85%
      height: 50px
      margin-left: auto
      margin-right: auto
    padding: 0 30px
    border: 2px solid swatch(poppy)
    display: flex
    align-items: center;
    border-radius: 0
    justify-content: center

  .dark
    color: swatch(white)
</style>
