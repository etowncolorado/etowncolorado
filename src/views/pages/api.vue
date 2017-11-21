
<template lang="pug">
  div(v-if="text", :class="$style.module") {{ text }}
</template>

<script>
  import content from '../../content/content'
  import axios from 'axios'

  // CFPAT-4a2c9f6430b62e77f3caff32cec88414d6734238b8ddd1f7d90421fdbe53806d

  const cdn = axios.create({
    baseURL: 'https://cdn.contentful.com/',
    timeout: 1000,
    headers: {
      'Authorization': 'Bearer 1bcd97b2b8a1c3073fb4f6c218e748b8ebfa34b25703e6458893c90c7c473ac5',
      'Content-Type': 'application/vnd.contentful.management.v1+json',
      'X-Contentful-Organization': '1TWfX5qTpZVVimGmWpXXee'
    }
  })

  const api = axios.create({
    baseURL: 'https://api.contentful.com/',
    timeout: 1000,
    headers: {
      'Authorization': 'Bearer CFPAT-4a2c9f6430b62e77f3caff32cec88414d6734238b8ddd1f7d90421fdbe53806d',
      'Content-Type': 'application/vnd.contentful.management.v1+json',
      'X-Contentful-Organization': '1TWfX5qTpZVVimGmWpXXee'
    }
  })

  const space = axios.create({
    baseURL: 'https://api.contentful.com/spaces/n2gdqhi9jvih/',
    timeout: 1000,
    headers: {
      'Authorization': 'Bearer CFPAT-4a2c9f6430b62e77f3caff32cec88414d6734238b8ddd1f7d90421fdbe53806d',
      'Content-Type': 'application/vnd.contentful.management.v1+json',
      'X-Contentful-Organization': '1TWfX5qTpZVVimGmWpXXee'
    }
  })

  export default {
    data() {
      return {
        text: null
      }
    },

    created() {
      space.get(`content_types`)
        .then(result => {
          console.log('result', result)
        })
    }
  }
</script>

<style lang="sass" module>
  .module
</style>
