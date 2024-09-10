<template>
    <div class="flex flex-col min-h-screen">
        <Navbar :centerContent="true">
            <slot/>
        </Navbar>
        <Spacer/>
        <Footer/>
    </div>
</template>

<script setup>
import Footer from "~/Components/Layout/Footer.vue";
import Navbar from "~/Components/Layout/Navbar.vue";
import Spacer from "~/Components/Layout/Spacer.vue";
</script>
