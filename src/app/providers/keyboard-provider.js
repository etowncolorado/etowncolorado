const Provider = require('@sssservices/support/provider')
const Keyboard = require('../support/keyboard')

class ContentfulProvider extends Provider {
  register() {
    this.app.singleton('keyboard', app => {
      return new Keyboard(global)
    })
  }
}

module.exports = ContentfulProvider
