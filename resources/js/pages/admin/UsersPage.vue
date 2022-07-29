<template>
    <BreadCrumbs :pages="breadcrumbPages" />

    <div class="col-sm-4 float-end">
        <input
            type="text"
            class="form-control"
            placeholder="Search"
            v-model="query"
        >
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Last Updated</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr
                v-for="user in users.data"
                :key="user.id"
            >
                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.created_at }}</td>
                <td>{{ user.updated_at }}</td>
                <td>
                    <InertiaLink
                        class="btn btn-secondary"
                        :href="'/admin/users/' + user.id"
                    >
                        Edit
                    </InertiaLink>
                </td>
            </tr>
        </tbody>
    </table>
    <nav>
        <ul class="pagination">
            <li
                v-for="link in users.links"
                class="page-item"
                :key="link.label"
            >
                <!-- eslint-disable vue/no-v-text-v-html-on-component -->
                <InertiaLink
                    :href="link.url"
                    class="page-link"
                    preserve-state
                    :class="{ disabled: link.active }"
                    v-html="link.label"
                />
            </li>
        </ul>
    </nav>
</template>

<script setup lang="ts">
import { InertiaLink } from "@inertiajs/inertia-vue3";
import { ref, watch } from "vue";
import { debounce } from "lodash";
import { Inertia } from "@inertiajs/inertia";
import BreadCrumbs from "@/components/BreadCrumbs.vue";
import { User } from "@/types";

defineProps<{
    users: User[]
}>();

let query = ref();

watch(query, debounce((val) => {
    Inertia.get("/admin/users", { query: val }, { preserveState: true, replace: true });
}, 350));

const breadcrumbPages = [
    {
        name: "Administration",
        url: "/admin"
    },
    {
        name: "Users",
        url: ""
    }
];

</script>

<style scoped>

</style>
