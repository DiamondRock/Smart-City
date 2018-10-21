/* eslint-disable */
import Vue from 'vue'
import App from './App.vue'
import Router from 'vue-router'
import ModalWizard from 'vue-modal-wizard'

import InformationGather from '@/components/InformationGather.vue'
import WelcomePage from '@/components/WelcomePage.vue'

Vue.config.productionTip = false

Vue.use(Router)
Vue.use(ModalWizard)

const router = new Router({
  routes: [
    {path: '/', name: 'type-selection', component: WelcomePage},
    {path: '/information', name: 'information', component: InformationGather}
  ]
})

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
