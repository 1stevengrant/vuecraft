<template>
  <div class="Home">
    <joblist></joblist>
  </div>
</template>

<script>
	import joblist from '../components/JobList'
	export default {
	  name: 'home',
	  components: { joblist }
	}
</script>

<style>
</style>