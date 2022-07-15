<template>
    <inertia-link
        :href="to"
        style="text-decoration: none;"
    >
        <slot />
    </inertia-link>
</template>

<script setup lang="ts">
import { InertiaLink } from "@inertiajs/inertia-vue3";

const props = defineProps<{
    to: string
}>();

</script>

<style scoped>

</style>
