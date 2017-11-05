
<template lang="pug">
  nav
    container(:class="$style.container")
      div(:class="$style.items")
        contentful(
          v-for="position in positions",
          v-if="fields[position]",
          :key="position",
          :class="[$style.item, $style[position]]",
          :entries="fields[position]"
        )
</template>

<script>
  export default {
    props: ['fields'],

    data() {
      return {
        positions: ['left', 'center', 'right']
      }
    }
  }
</script>

<style lang="sass" module>
  .container
    height: 100%

  .items
    display: flex
    height: 100%

  .item
    flex: 1 1 auto
    height: 100%
    display: flex
    align-items: center

  .center
    justify-content: center

  .right
    justify-content: flex-end
</style>
