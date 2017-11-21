
<template lang="pug">
  div(:class="$style.module")
    p(:class="$style.title", v-if="fields.title") {{ fields.title }}
    h3(:class="[$style.description, tight && $style.tight]", v-if="description") {{ description }}
</template>

<script>
  export default {
    props: ['fields'],

    computed: {
      tight() {
        return this.description && this.description.length > 20
      },

      description() {
        if (this.fields.description) {
          return this.fields.description
        }

        const type = this.fields.reference.sys.contentType.sys.id
        const fields = this.fields.reference.fields

        if (type === 'phone-number') {
          return fields.number.slice(2)
        }

        if (type === 'email') {
          return fields.email
        }

        if (type === 'address') {
          return fields.label
        }
      }
    }
  }
</script>

<style lang="sass" module>
  @import '~styles/core'

  .module
    position: relative

  .module:after
    top: 0
    left: -40px
    width: 2px
    bottom: 8px
    content: ' '
    position: absolute
    background: swatch(poppy)

  .title
    +typography (sans, large 13 14 light 0.25px)
    +prop (margin-left, large 2px)

  .description
    +typography (serif, large 33 44 light 0.25px)

  .tight
    +typography (serif, large 25 44 light 0.25px)
</style>
