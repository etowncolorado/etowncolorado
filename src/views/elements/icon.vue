
<template lang="pug">
  i(:class="classes")
</template>

<script>
  export default {
    props: ['id', 'fields'],

    computed: {
      classes() {
        return `fa fa-${this.name}`
      },

      name() {
        return this.id || this.fields.id
      }
    }
  }
</script>
