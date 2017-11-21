module.exports = {
  name: 'Name',

  providers: [
    // Sssservice providers
    require('@sssservices/view/view-provider'),

    // Application providers
    require('@app/providers/app-provider'),
    require('@app/providers/keyboard-provider'),
    require('@app/providers/contentful-provider'),
    require('@app/providers/markdown-provider'),
    require('@app/providers/route-provider'),
    require('@app/providers/vue-provider')
  ]
}
