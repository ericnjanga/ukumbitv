<template>
    <div id="app">

        <header-view></header-view>
        <router-view></router-view>
        <footer-view></footer-view>

    </div>
</template>

<script>
  import header from './components/header'
  import footer from './components/footer'

  export default {
    name: 'app',
    components: {
      footerView: footer,
      headerView: header
    }
  }
</script>
<style lang="scss" type="text/scss">

</style>
