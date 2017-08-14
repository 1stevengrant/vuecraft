<template>
	<div class="JobList">
		<h1>List of Posts from Element API</h1>
		<ul class="list-group">
			<li class="list-group-item" v-for="entry in jobs">{{ entry.title }}</li >
		</ul>
	</div>
</template>

<script>
	export default {
		name: 'joblist',
		data () {
			return {
				jobs: []
			}
		},
		mounted () {
  			this.getEntries();
  		},
  		methods: {
  			getEntries () {
  				let vm = this;
  				axios.get(`/api/v1/jobs.json`)
  				.then(response => {
  					this.jobs = response.data.data
  				})
  			}
  		}
	}
</script>

<style lang="css" scoped>
</style>