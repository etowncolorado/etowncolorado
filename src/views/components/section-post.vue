
<template lang="pug">
  section(:class="$style.module")
    container
      div(:class="$style.post")
        div(:class="$style.headline")
          p(:class="$style.date", v-if="fields.date") {{ date(fields.date) }}
          h1(:class="$style.title", v-if="fields.title") {{ fields.title }}
        div(:class="$style.image", v-if="!plain && fields.image")
          asset(:fields="fields.image.fields")
        markdown(:class="$style.text", :text="fields.text")
</template>

<script>

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
    props: ['fields'],

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
    +prop (padding-top, small 40px, large 68px)
    +prop (padding-bottom, small 44px, large 88px)

  .post
    +prop (margin-left, large 40px)
    +prop (max-width, large 65%)
    // max-width: 65%

  .headline
    position: relative
    &:after
      +prop (display, small none, large block)
      top: 4px
      left: -40px
      width: 1px
      bottom: 8px
      content: ' '
      position: absolute
      background: swatch(poppy)

  .date
    +typography(sans, small 12 24 bold 0.7px)
    +prop (text-align, small center, large left)
    color: swatch(poppy)

  .title
    +typography(serif, small 34 44 light)
    +prop (text-align, small center, large left)
    +prop (max-width, large 90%)
    color: swatch(grey)

  .image
    +prop (padding, small 4px 0 10px)
    +prop (margin-top, small 15px, large 30px)
    +viewport (small, large)
      margin-left: -20px
      margin-right: -20px
    img
      width: 100%
      height: auto
    
  .text
    +typography(sans, small 14 23 thin 1px, large 12 21 thin 0.5px)
    +prop (margin-top, small 30px)

</style>
