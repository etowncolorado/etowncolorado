import each from 'lodash/each'
import moment from 'moment'
import isArray from 'lodash/isArray'

export default class Database {
  constructor () {
    this.items = {}
  }

  store (entries) {
    each(entries, entry => {
      this.items[entry.sys.id] = this.model(entry)
    })
  }

  model (entry) {
    let model = {
      id: entry.sys.id,
      createdAt: moment(entry.sys.createdAt),
      updatedAt: moment(entry.sys.updatedAt)
    }

    model.contentType = (entry.sys.contentType)
      ? entry.sys.contentType.sys.id
      : 'asset'

    each(entry.fields, (field, key) => {
      if (isArray(field)) {
        this.hasMany(model, key, field)
      } else if (field && field.sys) {
        this.hasOne(model, key, field)
      } else {
        this.has(model, key, field)
      }
    })

    return model
  }

  hasMany (model, key, relation) {
    Object.defineProperty(model, key, {
      get: () => relation.map(entry => entry.sys.id)
    })
  }

  hasOne (model, key, relation) {
    Object.defineProperty(model, key, {
      get: () => relation.sys.id
    })
  }

  has (model, key, relation) {
    model[key] = relation
  }

  get (id) {
    return this.items[id]
  }
}
