import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue'
import { Link } from '@inertiajs/inertia-vue'

createInertiaApp({
    resolve: name => import(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        Vue.use(plugin)
        Vue.component('inertia-link', Link)

        new Vue({
            render: h => h(App, props),
        }).$mount(el)
    },
})
