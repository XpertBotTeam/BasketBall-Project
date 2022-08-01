import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Add_Teams_Ad from '../components/Add_Teams_Ad.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'Add_Teams_Ad',
    component: Add_Teams_Ad
  }
]

const router = new VueRouter({
  routes,
  mode: 'history',
})

export default router
