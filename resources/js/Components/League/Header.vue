<script setup>
import Image from 'primevue/image';
import Menu  from "~/Components/League/Menu.vue";
</script>

<template>
    <div class="flex flex-col w-full py-4">
        <Image src="/img/liga-logo.webp" alt="Logo" width="160" image-class="mx-auto mb-10" />
        <Menu class="lg:mx-auto"/>
    </div>
</template>

<style>
li[data-pc-section="inkbar"] {
    display: none;
}
</style>
