const Vue = require('vue').default
const Provider = require('@sssservices/support/provider')
const VueRouter = require('vue-router').default

class VueProvider extends Provider {
  register() {
    this.registerApp()

    this.registerBase()

    this.registerRouter()

    this.registerPlugins()
  }

  registerApp() {
    Vue.prototype.$app = require('@sssservices/foundation/helpers/app')
  }

  registerBase() {
    Vue.config.productionTip = false

    this.app.bind('vue', (app, config) => {
      return new Vue(config)
    })
  }

  registerRouter() {
    Vue.use(VueRouter)

    this.app.bind('vue.router', (app, config) => {
      return new VueRouter(config)
    })
  }

  registerPlugins() {
    Vue.use(require('../plugins/screen'))
  }

  boot() {
    this.mapComponents()
  }

  mapComponents() {
    const context = this.app.make('view.factory').shared()

    for (const key of context.keys()) {
      const name = key
        .split('/')
        .pop()
        .split('.')[0]

      Vue.component(name, context(key).default)
    }
  }
}

module.exports = VueProvider
