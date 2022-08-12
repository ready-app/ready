<template>
    <div class="p-5 mb-4 bg-light rounded-3 mt-4">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">READY</h1>
            <p class="fs-4">A web app to help manage your coursework!</p>
            <Link
                class="btn btn-primary"
                href="/register"
            >
                Sign up now!
            </Link>
        </div>
    </div>
    <div class="row align-items-md-stretch">
        <div class="col">
            <div class="h-100 p-5 bg-light border rounded-3">
                <h2>Weekly Schedule</h2>
                <p>View a weekly schedule of your classes, assignments, exams, and more!</p>
            </div>
        </div>
        <div class="col">
            <div class="h-100 p-5 bg-light border rounded-3">
                <h2>Assignment Tracker</h2>
                <p>Keeps track of your assignments, exams, and more!</p>
            </div>
        </div>
        <div class="col">
            <div class="h-100 p-5 bg-light border rounded-3">
                <h2>Easily add classes</h2>
                <p>Provide a list of your CRNs and we'll automatically load your classes!</p>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Link } from "@inertiajs/inertia-vue3";


</script>

<style scoped>

</style>
