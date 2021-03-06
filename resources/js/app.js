/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./notification');
require('./profile');
require('./modal');+
require('./article');
require('./helper');


window.Vue = require('vue');
import VueChatScroll from 'vue-chat-scroll'

Vue.use(VueChatScroll)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
* components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
Vue.component('global-chat', require('./components/GlobalChat.vue').default);
Vue.component('portfolio-page', require('./components/PortfolioPage.vue').default);

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


$(() => {
    var app = new Vue({
        el: '#app',
    });

    initProfile();
    initArticle();
    initNotifications();
    initHelpers();
});












