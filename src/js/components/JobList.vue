<template>
	<div class="JobList">
		<div class="form-group">
			<label for="keyword">Job Title</label>
			<input v-model="keyword"
			name="keyword"
			id="keyword" 
			placeholder="Search by job title" 
			class="form-control">
		</div>
		<h1>Showing {{ filteredByKeyword.length }} entries</h1>
		<ul class="list-group">
			<li class="list-group-item" v-for="entry in filteredByKeyword">{{ entry.title }}</li >
		</ul>
	</div>
</template>

<script>
	export default {
		name: 'joblist',
		data () {
			return {
				jobs: [],
				keyword: ''
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
  		},
  		computed: {
  			filteredByKeyword() {
    			return getByKeyword(this.jobs, this.keyword)
  			}
		}
	}

	function getByKeyword(jobs, keyword) {
		const search = keyword.trim().toLowerCase()
		if (!search.length) return jobs
  		return jobs.filter(item => item.name.toLowerCase().indexOf(search) > -1)
	}
</script>

<style lang="css" scoped>
</style>