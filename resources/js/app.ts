import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { createApp, h } from "vue";
import TheLayout from "./TheLayout.vue";
import "bootstrap/dist/js/bootstrap";
import { createPinia } from "pinia";

createInertiaApp({
    resolve: name => {
        const page = require(`./pages/${name}`).default; // eslint-disable-line
        page.layout = page.layout || TheLayout;
        return page;
    },
    setup({ el, app, props, plugin }) {
        const pinia = createPinia();
        createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(pinia)
            .mount(el);
    }
});
