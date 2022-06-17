<template>
    <div id="layout-page">
        <TheHeader />
        <div class="container mt-2">
            <slot />
        </div>
        <TheFooter id="footer" />
    </div>
</template>

<script setup>
import TheHeader from "./components/TheHeader";
import TheFooter from "./components/TheFooter";

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

