
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Noty = require('Noty');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('add-project', require('./components/AddProjectComponent.vue'));
Vue.component('edit-project', require('./components/EditProjectComponent.vue'));
Vue.component('delete-project', require('./components/DeleteProjectComponent.vue'));
Vue.component('add-beneficiary-personal', require('./components/AddBeneficiaryPersonalComponent.vue'));
Vue.component('add-beneficiary-household', require('./components/AddBeneficiaryHouseholdComponent.vue'));
Vue.component('add-beneficiary-contact', require('./components/AddBeneficiaryContactComponent.vue'));
Vue.component('beneficiary-dependent-component', require('./components/BeneficiaryDependentComponent.vue'));

import { store } from './store';

const app = new Vue({
    el: '#vueId',
    store
});
