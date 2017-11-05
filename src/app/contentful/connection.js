const Query = require('./query')

class Connection {
  constructor(app, client) {
    this.app = app
    this.client = client
  }

  from(type) {
    return this.query().from(type)
  }

  query() {
    return new Query(this)
  }

  select(statement) {
    return this.client.getEntries(statement)
  }
}

module.exports = Connection
