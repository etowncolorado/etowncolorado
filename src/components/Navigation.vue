<template>
  <div>
    Navigation
  </div>
</template>

<script>
export default {
  name: 'navigation',

  props: [
    'left',
    'center',
    'right'
  ],

  mounted () {
    console.log(this.$props)
  }
}
</script>

<style scoped>

</style>
