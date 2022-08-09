<template>
    <p>Dashboard Page</p>
    <div class="schedule">
        <TheSchedule />
    </div>
</template>

<script setup lang="ts">
import TheSchedule from "@/components/TheSchedule.vue";
</script>

<style scoped>
.schedule {
    height: 50vh;
}
</style>
