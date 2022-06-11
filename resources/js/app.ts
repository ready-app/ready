import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { createApp, h } from "vue";

createInertiaApp({
    resolve: name => require(`./pages/${name}`),
    setup({ el, app, props, plugin }) {
        createApp({ render: () => h(app, props) })
            .use(plugin)
            .mount(el);
    }
});
