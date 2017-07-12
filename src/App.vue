<template>
  <div id="app">
    <img src="./assets/logo.jpg">
    <h1>
      We have a new website!<br>
      Stay tuned...
    </h1>
  </div>
</template>

<script>
export default {
  name: 'app'
}
</script>

<style>
html {
  background-color: #1A1A1A;
  font-family: 'Old Standard TT', serif;
  text-transform: uppercase;
}


h1 {
  font-family: Helvetica, Arial, sans-serif;
  color: #E6E6E6;
  font-size: 22px;
  margin: 60px 0;
  line-height: 36px;
}

#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
