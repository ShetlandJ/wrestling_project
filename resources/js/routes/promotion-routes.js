import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const promotionRouter = [
  {
    path: '/promotion/:promotionName',
    name: 'promotion.page',
    component: () => import(/* webpackChunkName: "promotion" */ '../modules/Promotions/PromotionPage.vue')
  },
]

export default promotionRouter;
