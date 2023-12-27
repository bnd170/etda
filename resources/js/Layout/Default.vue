<template>
    <header>
        <Navbar>
            <slot />
        </Navbar>
    </header>
    <Spacer />
    <Footer/>
</template>

<script setup>
import Footer from "~/Components/Layout/Footer.vue";
import Navbar from "~/Components/Layout/Navbar.vue";
import Spacer from "~/Components/Layout/Spacer.vue";
</script>
