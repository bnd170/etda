<template>
    <div class="drawer block">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">
            <!-- Navbar -->
            <div class="navbar">
                <div class="flex-none">
                    <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
                        <svg class="hb" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10" stroke="currentColor" stroke-width=".6" fill="rgba(0,0,0,0)" stroke-linecap="round" style="cursor: pointer">
                            <path d="M2,3L5,3L8,3M2,5L8,5M2,7L5,7L8,7">
                                <animate dur="0.2s" attributeName="d" values="M2,3L5,3L8,3M2,5L8,5M2,7L5,7L8,7;M3,3L5,5L7,3M5,5L5,5M3,7L5,5L7,7" fill="freeze" begin="start.begin" />
                                <animate dur="0.2s" attributeName="d" values="M3,3L5,5L7,3M5,5L5,5M3,7L5,5L7,7;M2,3L5,3L8,3M2,5L8,5M2,7L5,7L8,7" fill="freeze" begin="reverse.begin" />
                            </path>
                            <rect width="10" height="10" stroke="none">
                                <animate dur="2s" id="reverse" attributeName="width" begin="click" />
                            </rect>
                            <rect width="10" height="10" stroke="none">
                                <animate dur="0.001s" id="start" attributeName="width" values="10;0" fill="freeze" begin="click" />
                                <animate dur="0.001s" attributeName="width" values="0;10" fill="freeze" begin="reverse.begin" />
                            </rect>
                        </svg>
                    </label>
                </div>
                <a href="/" class="flex-1 px-2 mx-2 text-xl font-bold">
                    <img :src="logo" alt="El talon de aquiles" class="w-6 mr-3">
                    El Talón de Aquiles
                </a>
            </div>

            <div  class="container mx-auto">
                <main class="px-5 md:px-0">
                    <slot/>
                </main>
            </div>

        </div>
        <div class="drawer-side">
            <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu pt-20 p-4 w-80 min-h-full bg-base-200">
                <Menu />
            </ul>
        </div>
    </div>


</template>
<script setup>
import Menu from "~/Components/Layout/Navbar/Menu.vue";

const logo = '/img/logo.svg';
</script>

<style scoped>
.navbar {
    @apply relative z-20;
}
.drawer-side {
    @apply z-10;
}
</style>
