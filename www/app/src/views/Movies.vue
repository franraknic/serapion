<template>
  <div class="movies">
    <Movies/>
  </div>
</template>

<script>
// @ is an alias to /src
import Movies from '@/components/Movies.vue'

export default {
  name: 'MoviesView',
  components: {
    Movies
  }
}
</script>
