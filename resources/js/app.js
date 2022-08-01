require('./bootstrap');

import Vue from 'vue';
import App from './App.vue'

Vue.component('app', require('./App.vue').default);

new Vue({
  render: h => h(App),
}).$mount('#app')