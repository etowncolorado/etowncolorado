
<template lang="pug">
  nav(:class="$style.module")
    container(flex)
      module
        newsletter-signup(:fields="fields.newsletter.fields")
      module(:class="$style.right", fill)
        div(:class="$style.item", v-for="entry in fields.links")
          hyperlink(:class="$style.link", :fields="entry.fields")
    container(:class="$style.info", flex)
      module
        | Left
      module
        | Right
</template>

<script>
  import NewsletterSignup from './newsletter-signup'

  export default {
    components: {
      NewsletterSignup
    },

    props: ['fields']
  }
</script>

<style lang="sass" module>
  @import '~styles/core'

  .module
    +prop (padding-top, large 50px)
    +prop (padding-bottom, large 60px)
    color: swatch(white)
    background: swatch(black)

  .link
    +typography (sans, large 13 36 bold 2.5px)
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

  .info
    +prop (margin-top, large 50px)
</style>
