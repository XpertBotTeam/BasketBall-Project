import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Add_Teams_Ad from '../components/Add_Teams_Ad.vue'
import Home_Usr from '../components/Home_Usr.vue'
import LoginPage from '../components/LoginPage.vue'
import RegisterPage from '../components/RegisterPage.vue'
import notFound from '../components/notFound.vue'
import NewsPage from '../components/NewsPage.vue'
import Add_News_Ad from '../components/Add_News_Ad.vue'
import TeamsPage from '../components/TeamsPage.vue'
import TeamDetails from '../components/TeamDetails.vue'
import AboutPage from '../components/AboutPage.vue'
import UpdateUsers_Ad from '../components/UpdateUsers_Ad.vue'
import UpdateTeams_Ad from '../components/UpdateTeams_Ad.vue'
import UpdateNews_Ad from '../components/UpdateNews_Ad.vue'
import EditProfile from '../components/EditProfile.vue'
import AdminRegister from '../components/AdminRegister.vue'
import chooseLogin from '../components/chooseLogin.vue'
import loginAdmin from '../components/loginAdmin.vue'
import TeamClips from '../components/TeamClips.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/team-clips',
    name: 'teamclips',
    component: TeamClips
  },
  {
    path: '/login-admin',
    name: 'loginAdmin',
    component: loginAdmin
  },
  {
    path: '/choose-login',
    name: 'chooselogin',
    component: chooseLogin
  },
  {
    path: '/admin-register',
    name: 'adminregister',
    component: AdminRegister
  },
  {
    path: '/edit-profile',
    name: 'editprofile',
    component: EditProfile
  },
  {
    path: '/updatenews',
    name: 'updatenews',
    component: UpdateNews_Ad
  },
  {
    path: '/updateteams',
    name: 'updateteams',
    component: UpdateTeams_Ad
  },
  {
    path: '/updateuser',
    name: 'updateUser',
    component: UpdateUsers_Ad
  },
  {
    path: '/about',
    name: 'about',
    component: AboutPage
  },
  {
    path: '/teamdetails',
    name: 'TeamDetails',
    component: TeamDetails
  },
  {
    path: '/teams',
    name: 'teams',
    component: TeamsPage
  },
  {
    path: '/add-news',
    name: 'add-news',
    component: Add_News_Ad
  },
  {
    path: '/news',
    name: 'news',
    component: NewsPage
  },
  {
    path: '/register',
    name: 'register',
    component: RegisterPage
  },
  {
    path: '/login',
    name: 'login',
    component: LoginPage
  },
  {
    path: '/',
    name: 'home',
    component: Home_Usr
  },
  {
    path: '/admin',
    name: 'admin',
    component: HomeView
  },
  {
    path: '/add-teams',
    name: 'Add_Teams_Ad',
    component: Add_Teams_Ad
  },
  {
    path: '*',
    component: notFound
  }
]

const router = new VueRouter({
  routes,
  mode: 'history',
})


export default router
