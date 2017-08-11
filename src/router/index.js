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
      name: 'landing',
      component: resolve => require(['@/components/landing'], resolve)
    },
    {
      path: '/main',
      name: 'main',
      component: resolve => require(['@/components/main'], resolve)
    },
    {
      path: '/video',
      name: 'video',
      component: resolve => require(['@/components/video'], resolve)
    },
    {
      path: '/list',
      name: 'list',
      component: resolve => require(['@/components/list'], resolve)
    },
    {
      path: '/tagvideo',
      name: 'tagvideo',
      component: resolve => require(['@/components/tagvideo'], resolve)
    },
    {
      path: '/category',
      name: 'category',
      component: resolve => require(['@/components/category'], resolve)
    },
    {
      path: '/search',
      name: 'search',
      component: resolve => require(['@/components/search'], resolve)
    },
    {
      path: '/about',
      name: 'about',
      component: resolve => require(['@/components/about'], resolve)
    },
    {
      path: '/mypackage',
      name: 'mypackage',
      component: resolve => require(['@/components/mypackage'], resolve)
    },
    {
      path: '/signup',
      name: 'signup',
      component: resolve => require(['@/components/signup'], resolve)
    },
    {
      path: '/confirmmail',
      name: 'confirmmail',
      component: resolve => require(['@/components/confirmmail'], resolve)
    },
    {
      path: '/signin',
      name: 'signin',
      component: resolve => require(['@/components/signin'], resolve)
    },
    {
      path: '/resetpas',
      name: 'resetpas',
      component: resolve => require(['@/components/resetpas'], resolve)
    },
    {
      path: '/checkmail',
      name: 'checkmail',
      component: resolve => require(['@/components/checkmail'], resolve)
    },
    {
      path: '/newpas',
      name: 'newpas',
      component: resolve => require(['@/components/newpas'], resolve)
    },
    {
      path: '/contact',
      name: 'contact',
      component: resolve => require(['@/components/contact'], resolve)
    },
    {
      path: '/jobs',
      name: 'jobs',
      component: resolve => require(['@/components/jobs'], resolve)
    },
    {
      path: '/job',
      name: 'job',
      component: resolve => require(['@/components/job'], resolve)
    },
    {
      path: '/helpcenter',
      name: 'helpcenter',
      component: resolve => require(['@/components/helpcenter'], resolve)
    },
    {
      path: '/help',
      name: 'help',
      component: resolve => require(['@/components/help'], resolve)
    },
    {
      path: '/privacy',
      name: 'privacy',
      component: resolve => require(['@/components/privacy'], resolve)
    }

  ]
})
