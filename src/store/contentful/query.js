import first from 'lodash/first'
import isNil from 'lodash/isNil'
import flattenDeep from 'lodash/flattenDeep'

const operators = {
  '=': '',
  '!=': '[ne]',
  '<': '[lt]',
  '<=': '[lte]',
  '>': '[gt]',
  '>=': '[gte]'
}

export default class Query {
  constructor (connection) {
    this.connection = connection
    this.query = {}
  }

  from (type) {
    this.query.content_type = type
    return this
  }

  whereNull (key) {
    this.query[`fields.${key}[exists]`] = false
  }

  whereNotNull (key) {
    this.query[`fields.${key}[exists]`] = true
  }

  where (key, operator, value) {
    if (isNil(value)) {
      value = operator
      operator = '='
    }

    this.query[`fields.${key}${operators[operator]}`] = value

    return this
  }

  take (limit) {
    this.query.limit = limit
    return this
  }

  find (id, ...fields) {
    this.query['sys.id'] = id
    return this.first(fields)
  }

  first (...fields) {
    return this.take(1).get(fields)
      .then(entries => first(entries))
  }

  get (...fields) {
    this.fields = flattenDeep(fields)
    this.query.select = 'sys.id,sys.contentType,sys.createdAt,sys.updatedAt'
    this.query.include = 10

    if (this.fields.length) {
      this.fields = this.fields.map(field => `fields.${field}`)
      this.query.select = `${this.query.select},${this.fields.join(',')}`
    } else {
      this.query.select = `${this.query.select},fields`
    }

    return this.connection.select(this.query)
  }
}
