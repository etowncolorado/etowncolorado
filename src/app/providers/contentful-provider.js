const Provider = require('@sssservices/support/provider')
const Contentful = require('contentful')
const Connection = require('../contentful/connection')

class ContentfulProvider extends Provider {
  register() {
    this.app.singleton('contentful.client', app => {
      return Contentful.createClient({
        space: app.make('config').get('services.contentful.space'),
        accessToken: app.make('config').get('services.contentful.token')
      })
    })

    this.app.singleton('contentful', app => {
      return new Connection(app, app.make('contentful.client'))
    })
  }
}

module.exports = ContentfulProvider
