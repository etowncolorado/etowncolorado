import Query from './query'
import Connection from './connection'
import each from 'lodash/each'

const connection = new Connection(
  process.env.CONTENTFUL_TOKEN,
  process.env.CONTENTFUL_SPACE
)

export default class Contentful {
  static connection (connection) {
    return new Query(connection)
  }
}

const methods = Object.getOwnPropertyNames(Query.prototype)
  .filter(method => method !== 'constructor')

each(methods, method => {
  Contentful[method] = function (...params) {
    const query = new Query(connection)
    return query[method](...params)
  }
})
