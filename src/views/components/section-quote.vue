
<template lang="pug">
  section(:class="$style.module")
    container(:class="$style.container")
      p(:class="$style.quote") &ldquo;{{ quote.quote }}&rdquo;
      hr(:class="$style.divider")
      p(:class="$style.author") 
        span(:class="$style.person") {{ person.first }} {{ person.last[0] }}. 
        span(:class="$style.city") {{ address.label }}
</template>

<script>
  export default {
    props: ['fields'],

    computed: {
      quote() {
        return this.fields.quote.fields
      },

      person() {
        return this.quote.person.fields
      },

      address() {
        return this.person.address.fields
      }
    }
  }
</script>

<style lang="sass" module>
  @import '~styles/core'

  .module
    +prop (padding-top, small 60px, large 82px)
    +prop (padding-bottom, small 56px, large 72px)
    
  .container
    text-align: center

  .quote
    +typography (serif, small 20 28 thin, large 33 44 light 0.3px)
    +prop (max-width, large 80%)
    margin: 0 auto

  .divider
    +prop (margin, small 20px auto 24px)
    width: 46px
    height: 2px
    border: none
    background: swatch(poppy)

  .author
    +typography (sans, small 13 16 light 0.5px)

  .person
    +font-weight(bold)

  .city
    font-style: italic
    margin-left: 4px
</style>
