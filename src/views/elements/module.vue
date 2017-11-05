
<template lang="pug">
  div(:class="[$style.module, flex && $style.flex, fill && $style.fill, strong && $style.strong]")
    slot
</template>

<script>
  export default {
    props: {
      flex: Boolean,
      fill: Boolean,
      strong: Boolean
    }
  }
</script>

<style lang="sass" module>
  .module
    width: 382px
    &:first-child
      margin-right: 40px
    &:last-child:not(:first-child)
      margin-left: 40px

  .flex
    display: flex

  .fill
    display: flex
    justify-content: space-between

  .strong
    width: 462px
    margin-right: 0

  .strong + .module
    margin-left: 0
</style>
