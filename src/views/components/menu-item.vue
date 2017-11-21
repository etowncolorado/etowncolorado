
<template lang="pug">
  div(:class="$style.module")
    h2(:class="$style.description") {{ fields.description }}
      template(v-if="fields.restricted") *
      | &nbsp;&nbsp;&nbsp;
      span(:class="$style.price") {{ fields.price }}
      span(:class="$style.substitutions", v-if="fields.substitutions")
        |  (
        span(:class="$style.substitution", v-for="substitution in fields.substitutions", :key="substitution.sys.id") {{ substitution.fields.description }} 
          span(:class="$style.price", v-if="substitution.fields.price") {{ substitution.fields.price }}
        | )
    p(:class="$style.ingredients") 
      template(v-if="fields.ingredients")
        template(:class="$style.ingredient", v-for="(ingredient, index) in fields.ingredients")
          | {{ ingredient.fields.description }}
          span(:class="$style.price", v-if="ingredient.fields.price")  {{ ingredient.fields.price }}
          template(v-if="index + 1 !== fields.ingredients.length")  | 
      template(v-if="fields.choices") your choice of {{ ingredients(fields.choices) }}
</template>

<script>
  import MenuSubstitution from './menu-substitution'
  import map from 'lodash/map'

  export default {
    components: {
      MenuSubstitution
    },

    props: ['fields'],

    methods: {
      ingredients(ingredients) {
        return map(ingredients, ingredient => {
          return ingredient.fields.description
        }).join(' | ')
      }
    }
  }
</script>

<style lang="sass" module>
  @import '~styles/core'

  .module

  .description
    +typography (serif, small 21 26 light, large 25 26 light)
    // +prop (max-width, large 300px)
    color: swatch(grey)

  .substitutions
    +typography (sans, small 12 20 light 0.8px)

  .substitution + .substitution
    &:before
      content: ',\00a0'

  .price
    +typography (sans, small 16 22 bold, large 12 20 bold 0.8px)
    +font-weight (bold)

  .ingredient:not(:last-child):after
    content: '\00a0|\00a0'

  .ingredients
    +typography (sans, small 14 21 light 0.5px, large 12 20 light 0.4px)
    // +prop (max-width, large 90%)
    +prop (margin-top, small 4px)
    hyphens: auto
    margin-left: 2px
</style>
