
<template lang="pug">
  span(:class="$style.module") {{ fields.description }}
    span(:class="$style.price", v-if="fields.price")  {{ fields.price }}
</template>

<script>
  export default {
    props: ['fields']
  }
</script>

<style lang="sass" module>
  @import '~styles/core'
  
  .module
    +typography (sans, large 12 16 light 0.8px)

  .price
    +font-weight (bold)

</style>
