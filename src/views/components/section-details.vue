
<template lang="pug">
  section(:class="$style.module")
    container(:class="$style.details", row)
      module(:class="$style.detail", v-for="detail in fields.details", :key="detail.sys.id")
        contact-detail(:fields="detail.fields")
    container(v-if="map")
      div(:class="$style.map")
        iframe(frameborder="0", :src="map", allowfullscreen)
</template>

<script>
  import ContactDetail from './contact-detail'

  export default {
    components: { ContactDetail },

    props: ['fields'],

    computed: {
      map () {
        return this.fields.map && `https://www.google.com/maps/embed/v1/place?q=place_id:ChIJFa_BMwTZQYcRMdT5lsXtweE&key=AIzaSyCJ8HtFWWZFvobIhmwtBGKet14oc4h4Q1A`
      }
    }
  }
</script>

<style lang="sass" module>
  @import '~styles/core'

  .module
    +prop (padding-top, small 60px)
    +prop (padding-bottom, small 40px, large 78px)

  .details
    margin-top: -30px

  .detail
    position: relative
    margin-top: 30px

  .detail:nth-child(odd)
    +prop (padding-left, large 40px)

  .map
    +prop (padding-top, small 66%, large 50%)
    +prop (margin-top, small 30px, large 70px)
    +prop (width, large 100%)
    +viewport (small, large)
      margin-left: -20px
      margin-right: -20px
    // width: 100%
    position: relative
    background: swatch(sand)
    iframe
      top: 0
      width: 100%
      height: 100%
      border: 0
      position: absolute
</style>
