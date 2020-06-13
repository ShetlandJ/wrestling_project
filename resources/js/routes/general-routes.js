import Home from '../views/Home.vue'

const generalRoutes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/about',
    name: 'About',
    meta: {
      auth: true
    },
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  },
]
export default generalRoutes
