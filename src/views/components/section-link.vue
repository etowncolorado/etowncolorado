
<template lang="pug">
  section(:class="$style.module")
    container(:class="$style.container", justify, align)
      h3(:class="$style.text") {{ fields.text }}
      cta-button(:class="$style.button", :fields="fields.link.fields") {{ fields.label }}
</template>

<script>
  import CtaButton from './cta-button'

  export default {
    components: {
      CtaButton
    },

    props: ['fields']
  }
</script>

<style lang="sass" module>
  @import '~styles/core'
  
  .module
    +prop (padding, small 30px 0, large 20px 0)
    background: swatch(sand)

  .container
    +prop (flex-direction, small column, large row)

  .text
    +typography (serif, small 23 34 light 0.2px)
    +prop (max-width, small 70%, large initial)
    +prop (text-align, small center, large left)

  .button
    +prop (margin, small 30px 0 15px, large 0 26px)
</style>
