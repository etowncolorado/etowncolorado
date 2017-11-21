
<template lang="pug">
  div(:class="$style.module")
    asset(:class="$style.image", v-if="!plain && fields.image", :fields="fields.image.fields")
    p(:class="$style.date", v-if="fields.date") {{ date(fields.date) }}
    h1(:class="$style.title", v-if="fields.title") {{ fields.title }}
    markdown(:class="$style.description", :text="fields.snippet")
    div(:class="$style.button")
      cta-button(:fields="link")
</template>

<script>
  import CtaButton from './cta-button'

  const months = {
    '01': 'January',
    '02': 'February',
    '03': 'March',
    '04': 'April',
    '05': 'May',
    '06': 'June',
    '07': 'July',
    '08': 'August',
    '09': 'September',
    '10': 'October',
    '11': 'November',
    '12': 'December'
  }

  export default {
    components: { CtaButton },

    props: {
      fields: Object,
      plain: Boolean
    },

    computed: {
      link() {
        return {
          label: 'READ MORE',
          url: `/blog?post=${this.fields.slug}`
        }
      }
    },

    methods: {
      date(date) {
        const [year, month, day] = date.split('-')

        return `${months[month]} ${Number(day)}, ${year}`
      }
    }
  }
</script>

<style lang="sass" module>
  @import '~styles/core'

  .module
    // +prop (padding-left, large 40px)
    position: relative
    align-items: flex-start
    flex-direction: column
    justify-content: center
    &:after
      top: 4px
      left: -41px
      width: 2px
      bottom: 0
      content: ' '
      position: absolute
      background: swatch(poppy)

  .image
    +prop (padding, large 4px 0 10px)

  .date
    +typography (sans, small 12 26 bold 0.7px, large 12 26 bold 0.7px)
    +prop (text-align, small center, large left)
    color: swatch(poppy)

  .title
    +typography (serif, small 25 30 light, large 25 30 light)
    +prop (text-align, small center, large left)
    +prop (max-width, large 90%)
    +prop (margin-top, small 4px, large 0)
    color: swatch(grey)
    
  .description
    +typography (sans, small 12 21 thin 0.8px, large 12 20 thin 0.8px)
    +prop (text-align, small center, large left)
    +prop (margin-top, small 13px, large 14px)
    +prop (margin-left, large 2px)
    +prop (margin-bottom, large 34px)
    color: swatch(grey)

  .button
    +prop (margin-top, small 30px, large 0)
    +prop (margin-left, large 2px)
    +prop (display, large inline-block)

</style>
