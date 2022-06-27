// require('./bootstrap');

import { createApp, h } from "vue";
import { InertiaProgress } from "@inertiajs/progress";
import { createInertiaApp } from "@inertiajs/inertia-vue3";

InertiaProgress.init();

createInertiaApp({
    resolve: (name) => import(`./Pages/${name}`),
    title: (title) => (title ? `${title} - Inertia CRUD` : "Inertia CRUD"),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mixin({ methods: { route } })
            .mount(el);
    },
});
