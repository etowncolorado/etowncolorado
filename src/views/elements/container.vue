
<template lang="pug">
  div(:class="[$style.module, flex && $style.flex]")
    slot
</template>

<script>
  export default {
    props: {
      flex: Boolean
    }
  }
</script>

<style lang="sass" module>
  @import '~styles/core'

  .module
    +prop (max-width, small 100px, medium 400px, large 904px)
    +prop (padding, small 0 10px, medium 0 20px, large 0 30px)
    margin-left: auto
    margin-right: auto

  .flex
    display: flex
</style>
