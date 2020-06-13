import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const authRouter = [
  {
    path: '/login',
    name: 'Login',
    component: () => import(/* webpackChunkName: "login" */ '../modules/Auth/Login.vue')
  },
  {
    path: '/register',
    name: 'Register',
    component: () => import(/* webpackChunkName: "register" */ '../modules/Auth/Register.vue')
  }
]

export default authRouter;
