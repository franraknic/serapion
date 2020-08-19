<template>
  <div>
    <h1>{{ movie.name }}</h1>
    <div>{{ movie.description }}</div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: 'Movie',
  data(){
    return{
      movie:{
          id: this.$route.params.id,
          name: '',
          description: '',
      }
    }
  },
  props: {
  },
  methods:{

  },
  mounted(){
    let vm = this;
    axios
      .get("http://localhost/api/public/movie/"+ vm.movie.id)
      .then(function(response){
        vm.movie = response.data;
      });
    }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
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
