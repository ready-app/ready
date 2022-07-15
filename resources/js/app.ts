import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import { createApp, h } from "vue";
import TheLayout from "@/TheLayout.vue";
import "bootstrap/dist/js/bootstrap";
import { createPinia } from "pinia";
import { resolvePageComponent } from "@/utils/resolve-page-components";
import PrimeVue from "primevue/config";
import RouterLink from "@/components/RouterLink.vue";

createInertiaApp({
    resolve: async name => {
        const page = (await resolvePageComponent(name, import.meta.glob("./pages/*.vue"))).default;
        page.layout = page.layout || TheLayout;
        return page;
    },
    setup({ el, app, props, plugin }) {
        const pinia = createPinia();
        createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(pinia)
            .use(PrimeVue)
            .component("router-link", RouterLink)
            .mount(el);
    }
});

InertiaProgress.init();
