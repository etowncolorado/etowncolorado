const HttpKernel = require('@sssservices/foundation/http/kernel')

class Kernel extends HttpKernel {
  handle() {
    super.handle()

    this.app.make('entry')
  }
}

module.exports = Kernel
