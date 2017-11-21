
<template lang="pug">
  div(:class="$style.module")
    div(:class="$style.menu", v-if="$screen.menu")
      div(:class="$style.items")
        hyperlink(:class="$style.link", v-for="entry in fields.links", :key="entry.sys.id", :fields="entry.fields", @nevigate="navigate")
      div(:class="$style.social")
    div(:class="[$style.burger, $screen.menu && $style.cross]", @click="toggle")
      span(:class="$style.one")
      span(:class="$style.two")
      span(:class="$style.three")
</template>

<script>
  export default {
    props: ['fields'],

    watch: {
      '$route' (to, from) {
        console.log('to', to)
        // react to route changes...
        this.$screen.menu = false
      }
    },

    methods: {
      toggle() {
        this.$screen.menu = !this.$screen.menu
      },

      navigate() {
        console.log('here')
      }
    }
  }
</script>

<style lang="sass" module>
  @import '~styles/core'

  .module
    +prop (display, small block, large none)
    +overlay
    z-index: 1000
    
  .menu
    +overlay
    display: flex
    background: rgba(swatch(black), 0.85)
    flex-direction: column

  .items
    flex: 1
    padding: 0 20px
    display: flex
    flex-direction: column


  .link
    +typography(sans, small 16 16 bold 0.5px)
    flex: 1
    color: white
    display: flex
    padding: 0 20px
    align-items: center
    border-bottom: 1px solid white
    &:global(.router-link-active)
      color: swatch(poppy)
      pointer-events: none

  .social
    height: 20px
    // background: green

  .burger
    top: 36px
    right: 10px
    width: 52px
    height: 52px
    cursor: pointer
    padding: 10px
    position: absolute
    span
      width: 32px
      height: 3px
      display: block
      position: relative
      background: swatch(black)
      transform-origin: 40%
  .one
    // transform: translateY(-8px)
  .two
    top: 6px
  .three
    top: 12px

  .cross
    span
      left: -3px
      width: 40px
      background: swatch(white)
    .one
      top: 6px
      transform: rotate(45deg)
    .two
      transform: scale(0)
    .three
      top: 6px
      transform: rotate(-45deg)
  //   span
  //     &:first-child
  //       transform: rotate(45deg)
  //     &:last-child
  //       transform: rotate(-45deg)
</style>
