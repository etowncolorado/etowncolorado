const Provider = require('@sssservices/support/provider')
const Entry = require('../../views/entry').default

class AppProvider extends Provider {
  register() {
    this.app.singleton('entry', app => {
      return app.make('vue', {
        el: '#app',
        router: app.make('router'),
        render: h => h(Entry)
      })
    })
  }
}

module.exports = AppProvider
