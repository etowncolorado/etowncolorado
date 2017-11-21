function route(path, view) {
  return {
    path: path,
    component: view
  }
}

function redirect(from, to) {
  return {
    path: from,
    redirect: to
  }
}

module.exports = [
  redirect('/', '/about'),
  route('/api', () => import('../views/pages/api.vue')),
  route('/:page?/(.*)?', () => import('../views/pages/contentful.vue'))
]
