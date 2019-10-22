/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import EasySlider from 'vue-easy-slider'

import { library } from '@fortawesome/fontawesome-svg-core'
import {
    faUserSecret,faHome, faInfoCircle,faUser,faPhoneSquareAlt,faDownload,faSignOutAlt,
    faTools,faIndustry,faSchool,faBlog,faTag,faMoneyBill,faCartPlus,faMoneyBillAlt,faHeart,
    faHistory,faMapMarkerAlt,faBarcode,faCheckCircle,faSignInAlt

}
from '@fortawesome/free-solid-svg-icons'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'
library.add(
    faUserSecret,faHome, faInfoCircle,faUser,faPhoneSquareAlt,faDownload,faSignOutAlt,
    faTools,faIndustry,faSchool,faBlog,faTag,faMoneyBill,faCartPlus,faMoneyBillAlt,faHeart,
    faHistory,faMapMarkerAlt,faBarcode,faCheckCircle,faSignInAlt
)

Vue.component('font-awesome-icon', FontAwesomeIcon)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import VueCarousel from 'vue-carousel';
import VuePersianDatetimePicker from 'vue-persian-datetime-picker';
Vue.component('date-picker', VuePersianDatetimePicker);
Vue.use(VueCarousel);
Vue.use(BootstrapVue)
Vue.use(EasySlider)



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('Master', require('./components/Layout/Master.vue').default);
Vue.component('AdminMaster', require('./components/Layout/AdminMaster.vue').default);

/*///////////////////////////////////////Pages////////////////////////////////*/
Vue.component('Home', require('./components/Page/Home.vue').default);
Vue.component('About', require('./components/Page/About.vue').default);
Vue.component('Account', require('./components/Page/Account.vue').default);
Vue.component('Login', require('./components/Page/Login.vue').default);
Vue.component('Contact', require('./components/Page/Contact.vue').default);
Vue.component('Cart', require('./components/Page/Cart.vue').default);
Vue.component('ShowPage', require('./components/Page/ShowPage.vue').default);
Vue.component('ShowContent', require('./components/Page/ShowContent.vue').default);
Vue.component('ShowContent', require('./components/Page/ShowContent.vue').default);
Vue.component('Test', require('./components/Page/Test.vue').default);


Vue.component('Top', require('./components/Menu/Top.vue').default);
Vue.component('MainMenu', require('./components/Menu/Main.vue').default);



/*////////////////////////////Admin////////////////////////////////////////////////*/
Vue.component('Admin', require('./components/Admin/Admin.vue').default);
Vue.component('Contents', require('./components/Admin/Content.vue').default);
Vue.component('User', require('./components/Admin/User.vue').default);




/*////////////////////////////Object////////////////////////////////////////////////*/
Vue.component('Product', require('./components/Object/Product.vue').default);
Vue.component('EditText', require('./components/Object/EditText.vue').default);
Vue.component('BigText', require('./components/Object/BigText.vue').default);




Vue.component('SlideShow', require('./components/Slider/SlideShow.vue').default);




const app = new Vue({
    el: '#app',
});
