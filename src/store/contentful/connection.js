import Database from './database'
import each from 'lodash/each'

export default class Connection {
  constructor (token, space) {
    this.database = new Database()
    this.client = require('contentful').createClient({
      space: space,
      accessToken: token
    })
  }

  select (query) {
    return this.client.getEntries(query)
      .then(response => {
        each(response.includes, includes => {
          this.database.store(includes)
        })

        return response.items.map(entry => {
          return this.database.get(entry.sys.id)
        })
      })
  }
}
