
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
      // console.log('this.fields.label', this.fields)
    }
  }
</script>

<style lang="sass" module>
  @import '~styles/core'

  .label
    +typography (sans, small 15 26 bold 1px, large 12 32 bold 0.75px)
    +prop (text-align, small center, large left)
    color: swatch(sand)
    display: block

  .group
    +prop (margin-top, small 18px, large 4px)
    +prop (margin-left, small 20px, large 0)
    +prop (margin-right, small 20px, large 0)
    +prop (flex-direction, small column, large row)
    display: flex

  .input
    +typography (sans, large 14 32 light 1.4px)
    +prop (height, small 48px, large 30px)
    +prop (padding, small 0 10px)
    +prop (text-align, small center, large left)
    flex: 1 0 auto
    border: none
    outline: none
    border-radius: 0

  .button
    +typography (sans, small 12 2 bold 0.7px)
    +prop (margin-top, small 15px, large 0)
    +prop (margin-left, large 10px)
    +prop (padding, large 0 20px)
    +prop (height, small 50px, large 30px)
    color: swatch(sand)
    cursor: pointer
    border: 1px solid swatch(poppy)
    display: flex
    outline: none
    background: swatch(black)
    border-radius: 0
    justify-content: center
</style>
