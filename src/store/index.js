import Contentful from './contentful'

Contentful.from('page')
  .where('slug', 'about')
  .first()
  .then(page => {
    console.log(page)
  })
