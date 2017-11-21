
<template lang="pug">
  div(:class="[$screen.menu && $style.menu]")
    router-view
    layout(:visible="$route.query.layout", :image="$route.params.page")
</template>

<style lang="sass" module>
  .menu
    top: 0
    left: 0
    width: 100vw
    height: 100vh
    display: static
    overflow: hidden
</style>

<style lang="sass">
  @import '~styles/core'
  @import '~styles/base'
</style>
