import get from 'lodash/get'
import set from 'lodash/set'
import map from 'lodash/map'
import remove from 'lodash/remove'

// let SHARED

export default class Keyboard {
  constructor(context) {
    this.callbacks = {}
    this.into(context)
  }

  on(type, callback) {
    let callbacks = get(this.callbacks, type, [])

    set(this.callbacks, type, callbacks)

    callbacks.push(callback)

    return this
  }

  off(type, callback) {
    const callbacks = get(this.callbacks, type, [])

    remove(callbacks, callback)

    return this
  }

  into(context) {
    if (this.compatible(context)) {
      context.addEventListener('keyup', this.press.bind(this))
      context.addEventListener('keydown', this.press.bind(this))
    }

    return this
  }

  press(evnt) {
    const type = evnt.type + ':' + evnt.key.toLowerCase()

    const callbacks = get(this.callbacks, type, [])

    map(callbacks, callback => callback(evnt))

    return this
  }

  compatible(context) {
    return !!context && !!context.addEventListener
  }

  // static on(type, callback) {
  //   return this.shared.on(type, callback)
  // }

  // static off(type, callback) {
  //   return this.shared.off(type, callback)
  // }

  // static get shared() {
  //   if (!SHARED) {
  //     SHARED = new this()
  //     SHARED.plugin()
  //   }

  //   return SHARED
  // }
}
