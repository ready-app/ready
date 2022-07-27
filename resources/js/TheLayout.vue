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
import { watch } from "vue";
import { POSITION, useToast } from "vue-toastification";

const userStore = useUserStore();
const page = usePage<{ user: User | null, flashMessage: { success: string | null, error: string | null } }>();

userStore.setUser(page.props.value.user);

Inertia.on("success", () => {
    if ("user" in page.props.value) {
        userStore.setUser(page.props.value.user);
        return;
    }
    userStore.setUser(null);
});

const toast = useToast();

watch(() => page.props.value.flashMessage, msg => {
    if (msg.success) {
        toast.success(msg.success, {
            timeout: 2000,
            position: POSITION.TOP_CENTER
        });
    }
    else if (msg.error) {
        toast.error(msg.error, {
            timeout: 2000,
            position: POSITION.TOP_CENTER
        });
    }
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

