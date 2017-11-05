require('./autoload')

const Application = require('@sssservices/foundation/application')

const app = new Application()

app.singleton('config.context', app => {
  return require.context('../config', false, /\.js$/)
})

app.singleton('http/kernel', app => {
  const Kernel = require('@app/http/kernel')

  return new Kernel(app)
})

app.singleton('console/kernel', app => {
  const Kernel = require('@sssservices/foundation/console/kernel')

  return new Kernel(app)
})

module.exports = app
