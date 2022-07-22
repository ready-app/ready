<template>
    <h2>Administration</h2>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <button
                class="nav-link"
                :class="{ active: curPage === 0 }"
                @click="setCurPage(0)"
            >
                Term Management
            </button>
        </li>
        <li class="nav-item">
            <button
                class="nav-link"
                :class="{ active: curPage === 1 }"
                @click="setCurPage(1)"
            >
                User Management
            </button>
        </li>
        <li class="nav-item">
            <button
                class="nav-link"
                :class="{ active: curPage === 2 }"
                @click="setCurPage(2)"
            >
                Announcements
            </button>
        </li>
    </ul>
    <div>
        <TermManagement v-if="curPage === 0" />
        <UserManagement v-else-if="curPage === 1" />
        <AnnouncementManagement v-else-if="curPage === 2" />
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import TermManagement from "@/components/admin/TermManagement.vue";
import UserManagement from "@/components/admin/UserMangement.vue";
import AnnouncementManagement from "@/components/admin/AnnouncementManagement.vue";

const curPage = ref(0);

const setCurPage = (page: number) => {
    curPage.value = page;
};

</script>

<style scoped>

</style>
