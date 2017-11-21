
<template lang="pug">
  section(:class="$style.module")
    container(:class="$style.container")
      div(:class="$style.headline")
        h3(:class="$style.title") {{ fields.title }}
        div(:class="$style.extras")
          p(:class="$style.description", v-if="fields.description") {{ fields.description }}
          p(v-if="fields.choices") Choice of 
            menu-substitution(:class="$style.substitution", v-for="choice in fields.choices", :key="choice.sys.id", :fields="choice.fields")
          menu-substitution(:class="$style.substitution", v-if="fields.substitutions", v-for="substitution in fields.substitutions", :key="substitution.sys.id", :fields="substitution.fields")

        //- substitions
    container(:class="[$style.container, $style.items]", row)
      module(:class="$style.group", v-for="(group, key) in items", :key="key")
        menu-item(:class="$style.item", v-for="item in group", :key="item.sys.id", :fields="item.fields")

      //- div(:class="$style.container")
</template>

<script>
  import MenuSubstitution from './menu-substitution'
  import MenuItem from './menu-item'
  import groupBy from 'lodash/groupBy'

  export default {
    components: {
      MenuSubstitution,
      MenuItem
    },

    props: ['fields'],

    computed: {
      items() {
        let index = 0

        return groupBy(this.fields.items, item => {
          return index++ % 2
        })
      }
    }
  }
</script>

<style lang="sass" module>
  @import '~styles/core'

  .module
    +prop (padding-top, small 40px, large 80px)
    +prop (padding-bottom, small 50px, large 88px)
    position: relative

  .module + .module
    +prop (padding-top, large 98px)

  .module:nth-child(odd)
    background: swatch(sand)

  .container
    position: relative

  .container:after
    +prop (display, small none, large block)
    top: 0
    left: 29px
    width: 2px
    bottom: 0
    content: ' '
    position: absolute
    background: swatch(poppy)

  .headline
    +prop (margin-top, large -20px)
    +prop (align-items, small flex-start, large flex-end)
    +prop (padding-left, large 40px)
    +prop (padding-bottom, small 16px, large 8px)
    +prop (flex-direction, small column, large row)
    display: flex

  .title
    +typography (serif, small 31 38 light, large 34 24 light 0.25px)
    +prop (margin-left, small -4px, large 0)
    margin: 0
    padding: 0

  .extras
    +typography (sans, small 13 16 light 0.5px)
    +prop (margin-left, large 20px)
    +prop (margin-bottom, large -3px)

  .substitution + .substitution
    &:before
      content: ',\00a0'

    // display: block

  .group:nth-child(odd)
    +prop (transform, large translateX(40px))

  .items
    +prop (padding-top, large 8px)

  .item
    +prop (margin-top, small 30px)
</style>
