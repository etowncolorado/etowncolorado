
<template lang="pug">
  section(:class="$style.module")
    container
      module(strong)
        h1(:class="$style.title", v-if="fields.title") {{ fields.title }}
        p(:class="$style.description", v-if="fields.description") {{ fields.description }}
        images(:class="$style.image", v-if="fields.image", :image="fields.image")
</template>

<script>
  export default {
    props: ['fields']
  }
</script>

<style lang="sass" module>
  @import '~styles/core'

  .title
    +typography(serif, small 34 44 light 1px)
    +prop (padding-left, large 40px)
    +prop (margin-top, large 54px)
    position: relative
    &:after
      top: 8px
      left: 0
      width: 2px
      bottom: 12px
      content: ' '
      position: absolute
      background: swatch(poppy)

  .description
    +typography(sans, small 13 22 thin 0.5)
    +prop (padding-left, large 40px)
    +prop (margin-top, large 20px)
</style>
