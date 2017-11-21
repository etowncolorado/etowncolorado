
<template lang="pug">
  section(:class="$style.module")
    container(justify, align)
      h3(:class="$style.text") {{ fields.text }}
</template>

<script>
  export default {
    props: ['fields']
  }
</script>

<style lang="sass" module>
  @import '~styles/core'

  .text
    +typography (serif, large 22 44 light 0.2px)
</style>
