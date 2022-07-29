<template>
    <BreadCrumbs :pages="breadcrumbPages" />
    <div class="card mb-2">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <p class="m-0">Users</p>
                <InertiaLink
                    class="btn btn-secondary"
                    href="/admin/users"
                >
                    Manage
                </InertiaLink>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <p class="m-0">Terms</p>
                <InertiaLink
                    class="btn btn-secondary"
                    href="/admin/terms"
                >
                    Manage
                </InertiaLink>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { InertiaLink } from "@inertiajs/inertia-vue3";
import BreadCrumbs from "@/components/BreadCrumbs.vue";

const breadcrumbPages = [
    {
        name: "Administration",
        url: ""
    }
];

</script>

<style scoped>

</style>
