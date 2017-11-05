
<template lang="pug">
  form(:class="$style.module")
    label(:class="$style.label", :for="fields.name") {{ fields.label }}
    p(:class="$style.group")
      input(:class="$style.input", :id="fields.name", type="text", placeholder="name@email.com")
      input(:class="$style.button", type="submit", value="SIGN UP")
</template>

<script>
  export default {
    props: ['fields'],

    mounted() {
      console.log('this.fields.label', this.fields)
    }
  }
</script>

<style lang="sass" module>
  @import '~styles/core'

  .label
    +typography (sans, large 12 32 bold 1px)
    color: swatch(sand)

  .group
    +prop (margin-top, large 2px)
    display: flex

  .input
    +typography (sans, large 14 32 light 1.4px)
    +prop (height, large 30px)
    +prop (padding, large 0 10px)
    flex: 1 0 auto
    border: none
    outline: none

  .button
    +typography (sans, large 12 2 bold 0.7px)
    +prop (margin-left, large 10px)
    +prop (padding, large 0 20px)
    +prop (height, large 30px)
    display: flex
    color: swatch(sand)
    cursor: pointer
    border: 2px solid swatch(poppy)
    outline: none
    background: swatch(black)
</style>
