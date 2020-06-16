import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const promotionRouter = [
  {
    path: '/promotions',
    name: 'promotions',
    component: () => import(/* webpackChunkName: "promotion" */ '../modules/Promotions/PromotionsPage.vue')
  },
  {
    path: '/promotions/:alias',
    name: 'promotion.view',
    component: () => import(/* webpackChunkName: "promotion" */ '../modules/Promotions/PromotionPage.vue')
  },
]

export default promotionRouter;
