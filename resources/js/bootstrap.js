import axios              from 'axios';
import {createApp, h}     from 'vue'
import {ZiggyVue}         from 'ziggy-js';
import {createInertiaApp} from '@inertiajs/vue3'
import 'css/variables.css';
import PrimeVue           from 'primevue/config';
import Lara               from './presets/lara';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


createInertiaApp({
    title: title => `${title} ${title ? '-':''} El Talón de Aquiles`,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', {eager: true})
        return pages[`./Pages/${name}.vue`]
    },
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin)
            .use(PrimeVue, {ripple: true, unstyled: true, pt: Lara})
            .use(ZiggyVue)
            .mount(el)
    },
})
