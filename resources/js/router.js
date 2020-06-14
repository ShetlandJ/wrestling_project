import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from './views/Home.vue'
import authRoutes from './routes/auth-routes';
import generalRoutes from './routes/general-routes';
import promotionRoutes from './routes/promotion-routes';

Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    ...authRoutes,
    ...generalRoutes,
    ...promotionRoutes
  ],
})

router.beforeEach((to, from, next) => {
  const loggedIn = localStorage.getItem('user')

  if (to.matched.some(record => record.meta.auth) && !loggedIn) {
    next('/login')
    return
  }
  next()
})

export default router
