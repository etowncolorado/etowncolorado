const Provider = require('@sssservices/support/provider')

class RouteProvider extends Provider {
  register() {
    this.app.singleton('router', app => {
      return app.make('vue.router', {
        mode: 'history',
        routes: require('../../routes/web')
      })
    })
  }
}

module.exports = RouteProvider
