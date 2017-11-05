const app = require('./bootstrap/app')

app.make('http/kernel').handle()
