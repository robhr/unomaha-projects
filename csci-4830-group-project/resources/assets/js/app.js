window.Vue = require('vue');
require('./bootstrap');

import Vuetify from 'vuetify';
window.Vue.use(Vuetify);

import VueMoment from 'vue-moment'
window.Vue.use(VueMoment);

Vue.component('confirmation-modal-component', require('./components/ConfirmationModalComponent.vue'));
Vue.component('projects-component', require('./components/ProjectsComponent.vue'));
Vue.component('project-component', require('./components/ProjectComponent.vue'));
Vue.component('customer-list-component', require('./components/CustomerListComponent.vue'));
Vue.component('customer-component', require('./components/CustomerComponent.vue'));
Vue.component('activity-component', require('./components/ActivityComponent.vue'));
Vue.component('metrics-component', require('./components/MetricsComponent.vue'));
Vue.component('daily-purchases-chart', require('./components/charts/DailyPurchases.vue'));

const app = new Vue({
    el: '#app'
});