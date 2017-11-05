module.exports = {
  default: 'shared',

  shared: require.context('../views/elements', true, /\.vue$/)
}
