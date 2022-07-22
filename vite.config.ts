import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import * as path from "path";
import * as os from "os";
import { config } from "dotenv";

config();

const url = new URL(process.env.APP_URL as string);

const localConfig: { host: string, https: boolean | object } = {
    host: url.host,
    https: false
};

// for Laravel Valet
if (localConfig.host !== "localhost" && process.env.VITE_APP_ENV === "dev") {
    localConfig.https = {
        key: os.homedir() + "/.config/valet/Certificates/" + url.host + ".key",
        cert: os.homedir() + "/.config/valet/Certificates/" + url.host + ".crt"
    };
}

export default defineConfig({
    server: localConfig,
    plugins: [
        laravel(["resources/js/app.ts", "resources/sass/app.scss"]),
        vue()
    ],
    resolve: {
        alias: {
            "@": path.resolve(__dirname, "resources/js")
        }
    }
});
