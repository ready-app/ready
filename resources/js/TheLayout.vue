<template>
    <div id="layout-page">
        <TheHeader />
        <div class="container mt-2">
            <slot />
        </div>
        <TheFooter id="footer" />
    </div>
</template>

<script setup lang="ts">
import TheHeader from "@/components/TheHeader.vue";
import TheFooter from "@/components/TheFooter.vue";
import { useUserStore } from "@/store/user";
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-vue3";
import { User } from "@/types";

const userStore = useUserStore();
const page = usePage<{ user: User | null }>();

userStore.setUser(page.props.value.user);

Inertia.on("success", () => {
    if ("user" in page.props.value) {
        userStore.setUser(page.props.value.user);
        return;
    }
    userStore.setUser(null);
});

</script>

<style scoped>
#layout-page {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
}

#footer {
    margin-top: auto;
}
</style>

