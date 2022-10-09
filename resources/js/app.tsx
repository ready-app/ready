import { createInertiaApp } from "@inertiajs/inertia-react";
import { InertiaProgress } from "@inertiajs/progress";
import React from "react";
import { createRoot } from "react-dom/client";
//import TheLayout from "@/TheLayout.vue";
import Layout from "@/components/Layout";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { Provider } from "react-redux";
import { store } from "./store";

createInertiaApp({
    // eslint-disable-next-line @typescript-eslint/ban-ts-comment
    // @ts-ignore
    resolve: name => {
        return resolvePageComponent(
            `./pages/${name}.tsx`,
            import.meta.glob("./pages/**/*.tsx")
        ).then(page => {
            // eslint-disable-next-line @typescript-eslint/ban-ts-comment
            // @ts-ignore
            page.default.layout = page.default.layout || Layout;
            return page;
        });
    },
    setup({ el, App, props }) {
        const root = createRoot(el);
        root.render(
            <Provider store={store}>
                <App {...props} />
            </Provider>
        );
    }
});

InertiaProgress.init();
