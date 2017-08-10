import Vue from 'vue'
import Router from 'vue-router'
// import Hello from '@/components/Hello'

Vue.use(Router)

export default new Router({
  linkActiveClass: 'active',
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'main',
      component: resolve => require(['@/components/main'], resolve)
    },
    {
      path: '/landing',
      name: 'landing',
      component: resolve => require(['@/components/landing'], resolve)
    }
    {
      path: '/video',
      name: 'video',
      component: resolve => require(['@/components/video'], resolve)
    }
  ]
})
