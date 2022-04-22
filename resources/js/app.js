import Vue from 'vue'
import { createInertiaApp, Link } from '@inertiajs/inertia-vue'

createInertiaApp({
    resolve: name => import(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        Vue.use(plugin)

        new Vue({
            render: h => h(App, props),
        }).$mount(el)
    },
})
