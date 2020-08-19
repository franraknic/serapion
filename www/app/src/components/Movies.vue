<template>
  <div>
    <h1>Movies</h1>
    <div class="form-group">
      <label>Movie name:</label>
      <input v-model="searchString" type="text" class="form-control">
      <button @click="searchMovies()" type="button" class="btn">Search</button>
      <div v-if="movies.length == 0">No movies found</div>
      <table v-if="movies.length != 0" class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="movie in movies" :key="movie.id">
          <td>{{movie.name}}</td>
          <td>{{movie.description}}</td>
          <td><button @click="openMovie(movie.id)" type="button" class="btn">Open</button></td>
        </tr>
      </tbody>
    </table>
    </div>
  </div>
</template>

<script>

import axios from 'axios'

export default {

  name: 'Movies',
  data(){
    return{
      searchString: '',
      movies: []
    }
  },
  props: {
  },
  methods:{
    searchMovies(){
      if(this.searchString != ''){
        let vm = this;
        axios
        .get("http://localhost/api/public/movies/"+vm.searchString)
        .then(function(response){
          if(response.data.error){
            vm.movies = [];
          }else{
            vm.movies = response.data;
          }
        });
      }
    },
    openMovie(id){
      this.$router.push('/movie/' + id);
    },
  },
  mounted(){
    
  }
}
</script>
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
