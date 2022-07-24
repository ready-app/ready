<template>
    <p>{{ counter }}</p>
    <button
        @click="increment"
        class="btn btn-secondary"
    >
        Increment
    </button><br>
    <TheModal
        title="Cool Modal"
        button-text="Open Modal"
        button-classes="btn btn-primary"
    >
        <p>modal content</p>
    </TheModal>
    <Link href="/login">Login page</Link><br>
    <Link href="/schedule">Go to schedule</Link>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import TheModal from "@/components/TheModal.vue";

let counter = ref(0);

const increment = () => {
    counter.value++;
};
</script>

<style scoped>

</style>
