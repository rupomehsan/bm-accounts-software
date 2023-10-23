
import './bootstrap';
import './plugins/axios_setup.js';
import './plugins/sweet_alert.js';
import { createApp } from 'vue';
import { createRouter, createWebHashHistory } from 'vue-router';
import { createPinia } from 'pinia'

import CommonInput from "./views/components/CommonInput.vue"
import ImageComponent from '../backend/views/components/ImageComponent.vue';

import App from "./views/App.vue";
import admin_routes from "./views/pages/admin/partials/routes"

const router = createRouter({
    history: createWebHashHistory(),
    routes: [
        {
            path: '/',
            component: App,
            children: [
                admin_routes,
            ]
        }
    ]
})

router.beforeEach((to, from, next) => {
    to.href.length > 2 &&
        window.sessionStorage.setItem('prevurl', to.href);
    next();
});

const pinia = createPinia()
const app = createApp({});
app.component('app', App);
app.component('common-input', CommonInput);
app.component('image-component', ImageComponent);
app.use(pinia)
app.use(router);
app.mount('#app');
