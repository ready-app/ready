<template>
    <BreadCrumbs :pages="breadcrumbPages" />
    <form @submit.prevent="submit">
        <div class="mb-3 col-sm-4">
            <label
                for="name-field"
                class="form-label"
            >Name:</label>
            <input
                id="name-field"
                type="text"
                class="form-control"
                v-model="form.name"
            >
        </div>
        <div class="mb-3 col-sm-4">
            <label
                for="code-field"
                class="form-label"
            >Code:</label>
            <input
                id="code-field"
                type="text"
                class="form-control"
                v-model="form.code"
            >
        </div>
        <div class="mb-3 col-sm-4">
            <label
                for="start-date-field"
                class="form-label"
            >Start Date:</label>
            <input
                id="start-date-field"
                type="date"
                class="form-control"
                v-model="form.start"
            >
        </div>
        <div class="mb-3 col-sm-4">
            <label
                for="end-date-field"
                class="form-label"
            >End Date:</label>
            <input
                id="end-date-field"
                type="date"
                class="form-control"
                v-model="form.end"
            >
        </div>
        <button
            type="submit"
            class="btn btn-success me-1"
        >
            Save
        </button>
        <button
            type="button"
            class="btn btn-danger"
            @click="del"
        >
            Delete
        </button>
    </form>
</template>

<script setup lang="ts">
import { useForm } from "@inertiajs/inertia-vue3";
import BreadCrumbs from "@/components/BreadCrumbs.vue";
import { Term } from "@/types";

const props = defineProps<{
    term: Term
}>();

const form = useForm({ ...props.term });

const submit = () => {
    form.patch("/admin/terms/" + form.id);
};

const del = () => {
    form.delete("/admin/terms/" + form.id);
};

const breadcrumbPages = [
    {
        name: "Administration",
        url: "/admin"
    },
    {
        name: "Terms",
        url: "/admin/terms"
    },
    {
        name: "Edit Term",
        url: ""
    }
];

</script>

<style scoped>

</style>
