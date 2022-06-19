import { defineConfig } from "vite";
import laravel from "vite-plugin-laravel";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    server: {
        host: "0.0.0.0"
    },
    plugins: [
        laravel(),
        vue()
    ]
});
