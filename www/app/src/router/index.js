import Vue from 'vue'
import VueRouter from 'vue-router'
import Movies from '../views/Movies.vue'
import Movie from '../views/Movie.vue'

Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    name: 'Movies',
    component: Movies
  },
  {
    path: '/movie/:id',
    name: 'Movie',
    component: Movie
  },
]

const router = new VueRouter({
  routes
})

export default router
