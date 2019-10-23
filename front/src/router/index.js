import Vue from 'vue'
import Router from 'vue-router'
import OpenWeatherMap from '../components/OpenWeatherMap'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'weather',
      component: OpenWeatherMap
    }
  ]
})
