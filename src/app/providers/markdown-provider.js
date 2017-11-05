const Provider = require('@sssservices/support/provider')
const Showdown = require('showdown')

class MarkdownProvider extends Provider {
  register() {
    this.app.singleton('markdown.converter', app => {
      return new Showdown.Converter()
    })

    this.app.singleton('markdown', (app, text) => {
      return app.make('markdown.converter').makeHtml(text)
    })
  }
}

module.exports = MarkdownProvider
