<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <Link
                href="/"
                class="navbar-brand"
            >
                READY
            </Link>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar"
                aria-controls="navbar"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon" />
            </button>
            <div
                class="collapse navbar-collapse"
                id="navbar"
            >
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <Link
                            href="/"
                            class="nav-link"
                            :class="{ active: isActive('/') }"
                        >
                            Home
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link
                            href="/schedule"
                            class="nav-link"
                            :class="{ active: isActive('/schedule') }"
                        >
                            Schedule
                        </Link>
                    </li>
                </ul>
                <div class="navbar-nav">
                    <Link
                        class="nav-link"
                        href="/admin"
                        v-if="userStore.user !== null && userStore.user.is_admin"
                    >
                        Administration
                    </Link>
                    <div
                        v-if="userStore.user !== null"
                        class="nav-item dropdown"
                    >
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            {{ userStore.user.name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <Link
                                    href="/settings"
                                    class="dropdown-item"
                                >
                                    Settings
                                </Link>
                            </li>
                            <li>
                                <Link
                                    href="/logout"
                                    class="dropdown-item"
                                >
                                    Logout
                                </Link>
                            </li>
                        </ul>
                    </div>
                    <div v-else>
                        <Link
                            href="/login"
                            class="btn btn-primary me-2"
                        >
                            Login
                        </Link>
                        <Link
                            href="/register"
                            class="btn btn-secondary"
                        >
                            Register
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script setup lang="ts">
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { ref } from "vue";
import { useUserStore } from "../store/user";

const userStore = useUserStore();

const path = ref(window.location.pathname);

Inertia.on("success", () => {
    path.value = window.location.pathname;
});

const isActive = (linkPath: string) => {
    return path.value === linkPath;
};

</script>

<style scoped>

</style>
