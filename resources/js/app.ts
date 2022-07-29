import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import { createApp, h } from "vue";
import TheLayout from "@/TheLayout.vue";
import "bootstrap/dist/js/bootstrap";
import { createPinia } from "pinia";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";

createInertiaApp({
    // eslint-disable-next-line @typescript-eslint/ban-ts-comment
    // @ts-ignore
    resolve: name => {
        return resolvePageComponent(
            `./pages/${name}.vue`,
            import.meta.glob("./pages/*.vue")
        ).then(page => {
            // eslint-disable-next-line @typescript-eslint/ban-ts-comment
            // @ts-ignore
            page.default.layout = page.default.layout || TheLayout;
            return page;
        });
    },
    setup({ el, app, props, plugin }) {
        const pinia = createPinia();
        createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(pinia)
            .mount(el);
    }
});

InertiaProgress.init();
