<template>
  <div id="app">
    <h1 id="logo">
      <img src="./assets/logo.svg">
    </h1>
    <h2>
      We have a new website!<br>
      Stay tuned...
    </h2>
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

h2 {
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

#logo {
  width: 200px;
  margin: 0 auto;
  padding: 10px;
  background: #666;
  line-height: 0;
}

#logo img {
  width: 155px;
  padding: 10px 20px;
  border: solid white 2px;
}
</style>
