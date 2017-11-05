
<template lang="pug">
  component(v-if="entries", :is="tag || 'div'")
    component(v-for="entry in entries", :key="entry.sys.id", :is="entry.sys.contentType.sys.id", :fields="entry.fields")
</template>

<script>
  export default {
    props: ['entries', 'tag'],

    components: {
      // Components
      'title-image': () => import('../components/title-image'),
      'navigation-footer': () => import('../components/navigation-footer'),
      'navigation-header': () => import('../components/navigation-header')
    },
  }
</script>
