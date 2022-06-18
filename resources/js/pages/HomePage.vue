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

<script setup lang="ts">
import { defineProps, ref } from "vue";
import { Link, usePage } from "@inertiajs/inertia-vue3";
import { User } from "../types";

// interface Props {
//     user: User | null
// }
//
// const props = defineProps<Props>();
//
// console.log(props);

let counter = ref(0);

const increment = () => {
    counter.value++;
};
</script>

<style scoped>

</style>
