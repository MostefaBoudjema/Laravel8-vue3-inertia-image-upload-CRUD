require('./bootstrap');

import { createApp, h } from "vue";
import { InertiaProgress } from "@inertiajs/progress";
import { createInertiaApp,Head, Link } from "@inertiajs/inertia-vue3";
InertiaProgress.init();

createInertiaApp({
    resolve: (name) => import(`./Pages/${name}`), //many js files
    // resolve: (name) => require(`./Pages/${name}`), one js file
    title: (title) => (title ? `${title} - Inertia CRUD` : "Inertia CRUD"),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component("Link",Link)
            .component("Head",Head)
            .mixin({ methods: { route } })
            .mount(el);
    },
});
