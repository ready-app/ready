<template>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <template
                v-for="(page, i) in pages"
                :key="i"
            >
                <li
                    v-if="i !== pages.length - 1"
                    class="breadcrumb-item"
                >
                    <InertiaLink :href="page.url">{{ page.name }}</InertiaLink>
                </li>
                <li
                    v-else
                    class="breadcrumb-item active"
                    aria-current="page"
                >
                    {{ page.name }}
                </li>
            </template>
        </ol>
    </nav>
</template>

<script setup lang="ts">
import { InertiaLink } from "@inertiajs/inertia-vue3";

type Page = {
    name: string,
    url: string
}

defineProps<{
    pages: Page[]
}>();

</script>

<style scoped>
.breadcrumb {
    --bs-breadcrumb-font-size: 20px;
}
</style>
