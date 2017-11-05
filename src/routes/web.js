// const view = require('@sssservices/foundation/helpers/view')

function route(path, view) {
  return {
    path: path,
    component: view // view(name)
  }
}

function redirect(from, to) {
  return {
    path: from,
    redirect: to
  }
}

module.exports = [
  route('/:page/(.*)?', () => import('../views/pages/contentful.vue'))
]
