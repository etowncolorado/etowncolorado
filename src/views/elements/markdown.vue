
<template lang="pug">
  div(:class="$style.module", v-html="$app('markdown', text)")
</template>

<script>
  export default {
    props: ['text']
  }
</script>

<style lang="sass" module>
  @import '~styles/core'

  .module
    +font-family (sans)
</style>
