import './bootstrap';
import '../css/app.css';
import { createApp, h, DefineComponent } from 'vue';
import {createInertiaApp, Link} from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import Vueform from '@vueform/vueform'
import vueformConfig from './../../vueform.config'

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob<DefineComponent>('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component('Link', Link)
            .use(Vueform, vueformConfig)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
    compilerOptions:{
        isCustomElement: tag => {
            console.log(tag)
            tag.startsWith('link') || tag.startsWith('Link')
        }
    }
});
