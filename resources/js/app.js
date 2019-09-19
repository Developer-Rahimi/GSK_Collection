/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import EasySlider from 'vue-easy-slider'
<<<<<<< HEAD
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faUserSecret)

Vue.component('font-awesome-icon', FontAwesomeIcon)
=======
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)
>>>>>>> install bootstrap
Vue.use(EasySlider)



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('Master', require('./components/Layout/Master.vue').default);


Vue.component('About', require('./components/Page/About.vue').default);
Vue.component('Contact', require('./components/Page/Contact.vue').default);
Vue.component('ShowPage', require('./components/Page/ShowPage.vue').default);
Vue.component('ShowContent', require('./components/Page/ShowContent.vue').default);



Vue.component('MainMenu', require('./components/Menu/Main.vue').default);
Vue.component('Access', require('./components/Menu/Access.vue').default);




Vue.component('SlideShow', require('./components/Slider/SlideShow.vue').default);




const app = new Vue({
    el: '#app',
});
