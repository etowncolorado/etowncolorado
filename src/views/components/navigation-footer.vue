
<template lang="pug">
  nav(:class="$style.module")
    container(row)
      module
        newsletter-signup(:fields="fields.newsletter.fields")
      module(:class="$style.large", fill)
        div(v-for="entry in fields.links")
          hyperlink(:class="$links.link", :fields="entry.fields")
    container(:class="$style.info", row)
      module(:class="$style.large", align)
        div(:class="$social.link", v-for="entry in fields.social")
          hyperlink(:fields="entry.fields")
      module
        div(:class="$info.group", v-for="group in chunk(fields.info, 2)")
          div(:class="$info.link", v-for="entry in group")
            hyperlink(:fields="entry.fields")
</template>

<script>
  import NewsletterSignup from './newsletter-signup'
  import chunk from 'lodash/chunk'

  export default {
    components: {
      NewsletterSignup
    },

    props: ['fields'],

    methods: {
      chunk
    }
  }
</script>

<style lang="sass" module="$links">
  @import '~styles/core'

  .link
    +typography (sans, large 12 36 bold 2.5px)
    color: swatch(white)
    position: relative
    &:global(.router-link-active)
      &:after
        left: 0
        right: 2px
        bottom: -8px
        height: 2px
        content: ' '
        position: absolute
        background: swatch(poppy)
</style>

<style lang="sass" module="$social">
  @import '~styles/core'

  .link
    color: swatch(black)
    width: 25px
    height: 25px
    display: flex
    font-size: 18px
    background: swatch(white)
    padding-top: 2px
    align-items: center
    justify-content: center

  .link + .link
    margin-left: 6px
</style>

<style lang="sass" module="$info">
  @import '~styles/core'

  .group
    +prop (text-align, small center, large right)

  .link
    +typography (sans, small 14 18 bold 1.5px, large 10 17 bold 0.75px)
    +prop (display, small block, large inline-block)
    +prop (margin-top, small 10px, large 0)
    color: swatch(white)
    &:nth-child(even)
      &:before
        +prop (display, small none, large inline)
        color: inherit
        content: '\00a0\00a0|\00a0\00a0'
</style>

<style lang="sass" module>
  @import '~styles/core'

  .module
    +prop (padding-top, small 50px)
    +prop (padding-bottom, small 60px)
    color: swatch(white)
    background: swatch(black)

  .info
    +prop (margin-top, small 40px, large 56px)

  .large
    +prop (display, small none, large flex)
</style>


