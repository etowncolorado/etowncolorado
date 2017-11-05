module.exports = {
  install(Vue) {
    Vue.prototype.$screen = new Vue({
      data: {
        viewport: null,
        viewports: {
          small: 0,
          medium: 768,
          large: 992
        }
      },

      created() {
        if (typeof window !== 'undefined') {
          window.addEventListener('resize', this.update.bind(this))

          this.update()
        }
      },

      methods: {
        update() {
          const width =
            window.innerWidth ||
            document.documentElement.clientWidth ||
            document.body.clientWidth

          for (const viewport in this.viewports) {
            if (this.viewports[viewport] > width) {
              return
            }

            this.viewport = viewport
          }
        }
      }
    })
  }
}
