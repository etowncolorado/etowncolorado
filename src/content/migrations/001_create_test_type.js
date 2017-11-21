class CreateTestType extends Migration {
  up() {
    Schema.create('test', function(type) {
      table.increments('id')
      table.string('name')
      table.string('email').unique()
      table.string('password')
      table.rememberToken()
      table.timestamps()
    })
  }

  down() {
    Schema.dropIfExists('users')
  }
}

module.exports = CreateTestType
