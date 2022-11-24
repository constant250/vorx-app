import './bootstrap';
import '../css/app.css';

import { createApp, h, ref } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import axios from 'axios';
import Swal from 'sweetalert2';
import BalmUI from 'balm-ui'; // Official Google Material Components
import BalmUIPlus from 'balm-ui-plus'; // BalmJS Team Material Components
import 'balm-ui-css';
import Particles from "vue3-particles";


const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(BalmUI)
            .use(BalmUIPlus)
            .use(Particles)
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });

function loginAuth() {
    localStorage.setItem('isLogged', false);
    
    if(localStorage.getItem('user-token')) {
        axios.defaults.headers.common.Authorization = `Bearer ${localStorage.getItem('user-token')}`
        axios.post('/api/v1/auth/user', {token: localStorage.getItem('user-token')})
        .then(res => {
            if(res.data.data.success) {
                const user = ref(res.data.data.user)
                localStorage.setItem('isLogged', true)
                localStorage.setItem('user_name', res.data.data.user.name)
                localStorage.setItem('user_email', res.data.data.user.email)
                // localStorage.setItem('user-token', res.data.data.user.api_token)
            } else {
                localStroage.removeItem('user-token')
                localStroage.removeItem('user_name')
                localStroage.removeItem('user_email')
                localStorage.setItem('isLogged', false)
            }
        })
        .catch(err => {
            localStorage.removeItem('user-token')
            localStroage.removeItem('user_name')
            localStroage.removeItem('user_email')
            localStorage.setItem('isLogged', false)
        })
    }

    if(!localStorage.getItem('user-token') && !localStorage.getItem('isLogged') || !localStorage.getItem('isViewed')){
        // window.location.href = '/login'
        localStorage.setItem('isViewed', true)
    }
}

loginAuth()