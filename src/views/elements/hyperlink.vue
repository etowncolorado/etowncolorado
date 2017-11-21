
<template lang="pug">
  router-link(v-if="linked", :class="[$style.module, visual && $style.image]", :to="href", @click="$emit('navigate')")
    slot(v-if="!visual && !iconic") {{ label }}
    images(v-if="visual", :fields="fields.image.fields")
    icon(v-if="iconic", :fields="fields.icon.fields")

  a(v-else, :class="[$style.module, visual && $style.image]", :href="href", @click="$emit('navigate')")
    slot(v-if="!visual && !iconic") {{ label }}
    images(v-if="visual", :fields="fields.image.fields")
    icon(v-if="iconic", :fields="fields.icon.fields")
</template>

<script>
  export default {
    props: ['fields'],

    computed: {
      linked() {
        return this.fields.reference && this.fields.reference.sys.contentType.sys.id === 'page'
      },

      visual() {
        return !!this.fields.image
      },

      iconic() {
        return !!this.fields.icon
      },

      type() {
        return this.fields
      },


      href() {
        return this.normalize(this.url)
      },

      url() {
        if (!this.fields.reference) {
          return this.fields.url
        }

        const type = this.fields.reference.sys.contentType.sys.id
        const fields = this.fields.reference.fields

        if (type === 'page') {
          return `/${fields.slug}`
        }

        if (type === 'url') {
          return fields.url
        }

        if (type === 'email') {
          return `mailto:${fields.email}`
        }

        if (type === 'phone-number') {
          return `tel://${fields.number}`
        }

        if (type === 'address') {
          return fields.url || `https://www.google.com/maps/@${fields.address.lat},${fields.address.long}`
        }

        return '#'
      },

      label() {
        if (this.fields.label) {
          return this.fields.label
        }

        const type = this.fields.reference.sys.contentType.sys.id
        const fields = this.fields.reference.fields

        if (type === 'url') {
          return fields.label || fields.url
        }

        if (type === 'email') {
          return fields.label || fields.email
        }

        if (type === 'phone-number') {
          return fields.label || fields.number
        }

        if (type === 'address') {
          return fields.label || fields.address
        }
      }
    },

    methods: {
      normalize(url) {
        return url || ''
      }
    }
  }
</script>

<style lang="sass" module>
  .module
    color: inherit
  .image
    line-height: 0
</style>
