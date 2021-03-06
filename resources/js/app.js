import 'es6-promise/auto'
import axios from 'axios'
import './bootstrap'
import Vue from 'vue'
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import Index from './Index'
import auth from './auth'
import router from './router'
import Vuetify from 'vuetify'
import { store } from './store/index'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import Vuelidate from 'vuelidate'
import AxiosPlugin from 'vue-axios-cors'
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

Vue.use(Vuelidate)
Vue.use(Vuetify)

// Set Vue globally
window.Vue = Vue

// Set Vue router
Vue.router = router
Vue.use(VueRouter)
Vue.use(AxiosPlugin)
    // Set Vue authentication
Vue.use(VueAxios, axios)
axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api`
Vue.use(VueAuth, auth)

// Load Index
Vue.component('index', Index)


const app = new Vue({
    el: '#app',
    router,
    store,
    vuetify: new Vuetify()
});