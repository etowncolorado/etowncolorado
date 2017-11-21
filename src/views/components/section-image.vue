
<template lang="pug">
  section(:class="classes", :style="fill(fields.background)")
    container(:class="$style.container", :reversed="fields.reversed", row)
      module(:class="$style.text", :gapless="fields.reversed", flex)
        h1(:class="$style.title", v-if="fields.title") {{ fields.title }}
        p(:class="$style.description", v-if="fields.description") {{ fields.description }}
        cta-button(:class="$style.button", v-if="fields.link", :fields="fields.link.fields", :dark="fields.dark")
      module(:class="$style.image", :gapless="!fields.reversed")
        asset(:fields="fields.image.fields")
</template>

<script>
  import CtaButton from './cta-button'

  export default {
    components: { CtaButton },

    props: ['fields'],

    computed: {
      classes() {
        return [
          this.$style.module,
          this.fields.background && this.$style.background,
          this.fields.dark && this.$style.dark,
          this.fields.offset && this.$style.offset,
          this.fields.reversed && this.$style.reversed
        ]
      }
    },

    methods: {
      fill(image) {
        if (image) {
          return {
            'background-image': `url(https:${image.fields.file.url})`
          }
        }
      }
    }
  }
</script>

<style lang="sass" module>
  @import '~styles/core'

  .module
    position: relative

  .module.background
    background-size: cover
    background-color: rgba(#fff, 0.8)
    background-repeat: no-repeat
    background-position: center
    background-blend-mode: multiply

    &.dark
      background-color: rgba(#000, 0.8)

  .background
    +prop (padding-top, small 22px, large 76px)
    +prop (padding-bottom, large 84px)
    .text
      .title:after
        display: none
    .description
      +prop (max-width, large 95%)
    .image
      +prop (margin-left, small 0 !important, large initial)
      +prop (margin-right, small 0 !important, large initial)
    .image:after
      +prop (display, small none, large block)
      top: 2px
      right: -41px
      width: 2px
      bottom: 6px
      content: ' '
      position: absolute
      background: swatch(poppy)

  .text
    +prop (margin-top, small 40px, large initial)
    +prop (padding-left, large 40px)
    align-items: flex-start
    flex-direction: column
    justify-content: center

  .offset
    .description
      +prop (max-width, large 100%)
    .text
      +prop (width, large 462px)
    .image
      +prop (width, large 302px)
    // width: 600px

  .title
    +typography (serif, small 24 36 light 1px, large 32 44 light 1px)
    +prop (margin-top, large -6px)
    +prop (max-width, small 380px, large initial)
    +prop (margin-left, small auto, large 0)
    +prop (margin-right, small auto, large 0)
    +prop (text-align, small center, large left)
    position: relative
    &:after
      +prop (display, small none, large block)
      top: 8px
      left: -41px
      width: 2px
      bottom: 12px
      content: ' '
      position: absolute
      background: swatch(poppy)

  .description
    +typography(sans, small 14 21 thin 0.25px, large 12 21 thin 0.25px)
    +prop (text-align, small center, large left)
    +prop (max-width, small 320px, large 85%)
    +prop (margin-top, small 16px, large 12px)
    +prop (margin-left, small auto, large 4px)
    +prop (margin-right, small auto, large 0)
    +prop (margin-bottom, small 24px, large 42px)

  .button
    +prop (margin-bottom, small 44px, large 8px)

  .image
    +prop (margin-left, small -20px !important, large initial)
    +prop (margin-right, small -20px !important, large initial)
    position: relative
    +viewport (small, medium)
      img
        width: 100%
        height: auto

  .dark
    color: swatch(white)
    background: swatch(black)
    .background
      background: swatch(black)
</style>
