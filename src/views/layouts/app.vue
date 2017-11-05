<template>
  <transition name="transition" mode="out-in">
    <router-view />
  </transition>
</template>

<style lang="sass">
  @import '~styles/core'
  @import '~styles/base'

  // .transition-enter-active
  //   transition-duration: 800ms

  // .transition-leave-active
  //   transition-duration: 400ms
</style>
