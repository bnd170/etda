<template>
    <div class="container mx-auto">
        <header>
            <Navbar />
        </header>
        <main>
            <slot/>
        </main>
        <Spacer />
        <Footer/>
    </div>
</template>

<script setup>
import Footer from "~/Components/Layout/Footer.vue";
import Navbar from "~/Components/Layout/Navbar.vue";
import Spacer from "~/Components/Layout/Spacer.vue";
</script>
