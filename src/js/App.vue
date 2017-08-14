<template>
  <div id="app">
    <mast></mast>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <router-view></router-view>
        </div>
      </div>
      <siteFooter></siteFooter>
    </div>
  </div>
</template>

<script>
import mast from './components/Header/Mast'
import siteFooter from './components/SiteFooter'

export default {
  name: 'app',
  components: { siteFooter, mast },
}

</script>

<style lang="scss">
@import '../scss/app';
</style>