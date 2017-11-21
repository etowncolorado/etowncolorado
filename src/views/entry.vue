
<template lang="pug">
  div
    router-view
    layout(:visible="$route.query.layout", :image="$route.params.page")
</template>

<style lang="sass">
  @import '~styles/core'
  @import '~styles/base'
</style>
