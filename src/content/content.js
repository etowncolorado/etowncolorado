const content = {}
const files = require.context('./data', false, /^(?!_).*\.json$/)
const paths = files.keys()

for (const path of paths) {
  const entries = files(path)

  const type = path
    .replace(/\.json$/, '')
    .split('/')
    .pop()

  for (const index in entries) {
    if (entries[index].id === undefined) {
      entries[index].id = Number(index) + 1
    }
  }

  content[type] = entries
}

export default content
