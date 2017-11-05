
<template lang="pug">
  div(:class="$style.module", v-html="$app('markdown', fields.large)")
</template>

<script>
  export default {
    props: ['fields']
  }
</script>

<style lang="sass" module>
  @import '~styles/core'

  .module
    +font-family (sans)
</style>
