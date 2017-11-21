
<template lang="pug">
  section(:class="$style.module")
    container
      markdown(:class="$style.disclaimer", :text="fields.disclaimer")
</template>

<script>
  export default {
    props: ['fields']
  }
</script>

<style lang="sass" module>
  @import '~styles/core'
  
  .module
    // +prop (padding-top, large 60px)
    +prop (padding-bottom, small 40px, large 68px)

  .disclaimer
    +typography (sans, small 9 14 light, large 10 16 light)
    +prop (max-width, large 60%)
    color: swatch(grey)

    p + p
      +prop (margin-top, small 12px, large 16px)
</style>
