<template>
    <BreadCrumbs :pages="breadcrumbPages" />
    <InertiaLink
        class="btn btn-success float-end"
        href="/admin/terms/create"
    >
        New Term
    </InertiaLink>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Code</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr
                v-for="term in terms"
                :key="term.id"
            >
                <td>{{ term.id }}</td>
                <td>{{ term.name }}</td>
                <td>{{ term.code }}</td>
                <td>{{ term.start }}</td>
                <td>{{ term.end }}</td>
                <td>
                    <InertiaLink
                        class="btn btn-secondary"
                        :href="'/admin/terms/' + term.id"
                    >
                        Edit
                    </InertiaLink>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script setup lang="ts">
import { InertiaLink } from "@inertiajs/inertia-vue3";
import BreadCrumbs from "@/components/BreadCrumbs.vue";
import { Term } from "@/types";

defineProps<{
    terms: Term[]
}>();

const breadcrumbPages = [
    {
        name: "Administration",
        url: "/admin"
    },
    {
        name: "Terms",
        url: ""
    }
];

</script>

<style scoped>

</style>
