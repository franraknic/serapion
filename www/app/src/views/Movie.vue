<template>
  <div class="movies">
    <Movie/>
  </div>
</template>

<script>
// @ is an alias to /src
import Movie from '@/components/Movie.vue'

export default {
  name: 'MovieView',
  components: {
    Movie
  }
}
</script>
