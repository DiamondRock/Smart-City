import Vue from 'vue'
import App from './App.vue'
import VueResource from 'vue-resource'

export const eventBus = new Vue();

Vue.use(VueResource);

new Vue({
  el: '#app',
  render: h => h(App)
})

