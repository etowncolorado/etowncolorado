import Vue from 'vue'
import App from './App'
import Contentful from './store/contentful'
import router from './router'

Vue.config.productionTip = false

Contentful.from('page')
  .where('slug', 'about')
  .first()
  .then(page => {
    console.log(page)
  })

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  render: h => h(App)
})
