
<template lang="pug">
  component(v-if="entries", :is="tag || 'div'")
    component(v-for="entry in entries", :key="entry.sys.id", :is="entry.sys.contentType.sys.id", :fields="entry.fields")
</template>

<script>
  export default {
    props: ['entries', 'tag'],

    components: {
      // Components
      'section-blog': () => import('../components/section-blog'),
      'section-hero': () => import('../components/section-hero'),
      'section-link': () => import('../components/section-link'),
      'section-menu': () => import('../components/section-menu'),
      'section-post': () => import('../components/section-post'),
      'section-error': () => import('../components/section-error'),
      'section-image': () => import('../components/section-image'),
      'section-quote': () => import('../components/section-quote'),
      'section-legal': () => import('../components/section-legal'),
      'section-posts': () => import('../components/section-posts'),
      'section-details': () => import('../components/section-details'),
      'navigation-footer': () => import('../components/navigation-footer'),
      'navigation-header': () => import('../components/navigation-header')
    },
  }
</script>
