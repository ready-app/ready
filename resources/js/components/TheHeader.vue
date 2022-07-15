<template>
    <Menubar :model="items">
        <template #start>
            <h2>READY</h2>
        </template>
        <template #end>
            <div v-if="userStore.user === null">
                <InertiaLink
                    style="text-decoration: none;"
                    href="/login"
                >
                    <Button class="login-button">Login</Button>
                </InertiaLink>
                <InertiaLink
                    style="text-decoration: none;"
                    href="/register"
                >
                    <Button class="p-button-secondary">Register</Button>
                </InertiaLink>
            </div>
            <div v-else>
                <Button
                    class="p-button-text p-button-secondary"
                    aria-haspopup="true"
                    aria-controls="overlay-profile-menu"
                    @click="toggleProfileMenu"
                >
                    {{ userStore.user.name }}
                    <Avatar
                        icon="pi pi-user"
                        class="ml-2 border-circle"
                        size="normal"
                    />
                </Button>
                <Menu
                    id="overlay-profile-menu"
                    :popup="true"
                    ref="profileMenu"
                    :model="profileItems"
                />
            </div>
        </template>
    </Menubar>
</template>

<script setup lang="ts">
import Button from "primevue/button";
import Avatar from "primevue/avatar";
import Menu from "primevue/menu";
import { Inertia } from "@inertiajs/inertia";
import { ref } from "vue";
import { useUserStore } from "@/store/user";
import Menubar from "primevue/menubar";
import { InertiaLink } from "@inertiajs/inertia-vue3";

const userStore = useUserStore();

const path = ref(window.location.pathname);

Inertia.on("success", () => {
    path.value = window.location.pathname;
});

const profileMenu = ref();

const toggleProfileMenu = (event: any) => {
    profileMenu.value.toggle(event);
};

const items = ref([
    {
        label: "Home",
        icon: "pi pi-fw pi-home",
        to: "/"
    },
    {
        label: "Schedule",
        icon: "pi pi-fw pi-calendar",
        to: "/schedule",
        visible: () => userStore.user !== null
    }
]);

const profileItems = ref([
    {
        label: "Logout",
        to: "/logout"
    }
]);

const test = (item: any) => {
    console.log(item);
};

</script>

<style scoped>
h2 {
    margin: 0;
    margin-right: 10px;
    padding: 0;
}

.login-button {
    margin-right: 8px;
}
</style>
