<template>
    <p>{{ counter }}</p>
    <button
        @click="increment"
        class="btn btn-secondary"
    >
        Increment
    </button><br>
    <Link href="/login">Login page</Link><br>
    <Link href="/schedule">Go to schedule</Link>
</template>

<script setup>
import  { ref } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

let counter = ref(0);

const increment = () => {
    counter.value++;
};
</script>

<style scoped>

</style>
