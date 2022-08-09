<template>
    <FullCalendar :options="calendarOpts" />
</template>

<script setup lang="ts">
import "@fullcalendar/core/vdom";
import FullCalendar from "@fullcalendar/vue3";
import timegrid from "@fullcalendar/timegrid";
import { ref } from "vue";

const date = new Date();

const calendarOpts = ref({
    plugins: [ timegrid ],
    initialView: "timeGridWeek",
    weekends: false,
    slotMinTime: "07:00:00",
    headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "timeGridWeek,timeGridDay"
    },
    height: "50vh",
    allDaySlot: false,
    scrollTime: "13:00:00"
});
</script>

<style scoped>

</style>
