/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./html');

import Vue from 'vue';
import VueRouter from 'vue-router';
import ViewUI from 'view-design';

Vue.use(VueRouter);
Vue.use(ViewUI);

// window.Vue = require('vue');
// import VueRouter from 'vue-router'
Vue.use(VueRouter);

import 'material-icons/iconfont/material-icons.css';
import '@fortawesome/fontawesome-free'
import 'view-design/dist/styles/iview.css';


import Toasted from 'vue-toasted';
Vue.use(Toasted)

Vue.toasted.register('error', message => message, {
    position: 'bottom-center',
    duration: 1000
})

import iView from 'iview';
import locale from 'iview/dist/locale/en-US';
import 'iview/dist/styles/iview.css';
Vue.use(iView, {
    locale
});


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('main-page', require('./components/main/main.vue').default)
Vue.component('sidebar', require('./components/main/sidebar.vue').default)
Vue.component('menu-header', require('./components/main/header.vue').default)

var error = Vue.component('error-page', require('./components/error/error.vue').default)

var login = Vue.component('login-page', require('./components/login/login.vue').default)
var register = Vue.component('register-page', require('./components/login/register.vue').default)
var registrationConfirmation = Vue.component('register-confirmation-page', require('./components/login/register_confirmation.vue').default)
var forgotPassword = Vue.component('forgot-password-page', require('./components/login/forgot_password.vue').default)


var dashboard = Vue.component('dashboard-page', require('./components/main/dashboard.vue').default)

var profile = Vue.component('profile-page', require('./components/profile/index.vue').default)
var account = Vue.component('account-page', require('./components/user/index.vue').default)
var folder = Vue.component('folder-page', require('./components/folder/index.vue').default)

var manageDocument = Vue.component('document-page', require('./components/document/index.vue').default);
var searchDocument = Vue.component('search-page', require('./components/document/search.vue').default);
var listDocumentByMinistry = Vue.component('document-byministry-page', require('./components/document/listbyministry.vue').default);

var report = Vue.component('report-page', require('./components/report/index.vue').default)

var role = Vue.component('role-page', require('./components/role/index.vue').default);

var about = Vue.component('about-page', require('./components/about/index.vue').default);
var logout = Vue.component('logout-page', require('./components/logout/logout.vue').default);


// override the string prototype to inject function ucFirst to the string variable
String.prototype.ucfirst = function() {
    return this.charAt(0).toUpperCase() + this.substr(1);
}

const app = new Vue({}).$mount('#app')