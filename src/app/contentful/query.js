class Query {
  constructor(connection) {
    this.connection = connection
    this.query = {}
  }

  from(type) {
    this.query.content_type = type

    return this
  }

  where(field, value) {
    let key = `fields.${field}`

    if (field === 'id') {
      key = 'sys.id'
    }

    this.query[key] = value

    return this
  }

  load(depth) {
    this.query.include = depth

    return this
  }

  find(id) {
    this.where('id', id)

    return this.first()
  }

  first(callback) {
    let request = this.get(result => {
      return result && result.items && !!result.items.length && result.items[0]
    })

    if (callback) {
      request = request.then(callback)
    }

    return request
  }

  get(callback) {
    let request = this.connection.select(this.query)

    if (callback) {
      request = request.then(callback)
    }

    return request
  }
}

module.exports = Query
