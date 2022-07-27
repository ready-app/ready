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
                for="email-field"
                class="form-label"
            >Email:</label>
            <input
                id="email-field"
                type="email"
                class="form-control"
                v-model="form.email"
            >
        </div>
        <div class="mb-3 col-sm-4">
            <div class="form-check">
                <input
                    id="admin-field"
                    class="form-check-input"
                    type="checkbox"
                    v-model="form.is_admin"
                >
                <label
                    for="admin-field"
                    class="form-check-label"
                >Is admin?</label>
            </div>
        </div>
        <button
            class="btn btn-success me-1"
            type="submit"
        >
            Save
        </button>
        <button
            class="btn btn-danger"
            type="button"
            @click="del(form.id)"
        >
            Delete
        </button>
    </form>
</template>

<script setup lang="ts">
import { InertiaLink, useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import BreadCrumbs from "@/components/BreadCrumbs.vue";

const props = defineProps<{
    editingUser: any
}>();

const form = useForm({
    ...props.editingUser
});

const submit = () => {
    form.patch("/admin/users/" + form.id);
};

const del = (id: string) => {
    Inertia.delete("/admin/users/" + id);
};

const breadcrumbPages = [
    {
        name: "Administration",
        url: "/admin"
    },
    {
        name: "Users",
        url: "/admin/users"
    },
    {
        name: "Edit User",
        url: ""
    }
];

</script>

<style scoped>

</style>
