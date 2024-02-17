<template>
    <input ref="drawer" v-model="iconStatus" id="menu" type="checkbox" class="drawer-toggle" @input="toggleMenu"/>
    <div class="drawer-content flex flex-col">
        <!-- Navbar -->
        <div class="navbar">
            <div class="flex-none">
                <label for="menu" aria-label="open sidebar">
                    <div class="hamburger" :class="iconStatus ? 'hamburger--is-open' : ''">
                        <div class="hamburger__item hamburger__item--first"></div>
                        <div class="hamburger__item hamburger__item--middle"></div>
                        <div class="hamburger__item hamburger__item--last"></div>
                    </div>
                </label>
            </div>
            <a href="/" class=" pl-5 mx-2 text-xl font-[Cabin]">
                <Logo class="w-6 mr-3 inline" />
                El Talón de Aquiles
            </a>
            <ThemeSwitcher />
        </div>

        <main>
            <slot/>
        </main>

    </div>

    <Sidebar v-model:visible="iconStatus" @hide="menuClosed" :base-z-index="10">
        <template #container="{ closeCallback }">
            <Menu/>
        </template>
    </Sidebar>
</template>
<script setup>
import Sidebar from 'primevue/sidebar';
import Menu    from "~/Components/Layout/Navbar/Menu.vue";
import {ref}   from "vue";
import Logo    from "./Logo.vue";
import ThemeSwitcher from "./ThemeSwitcher.vue";


const iconStatus = ref(false);

const toggleMenu = (event) => {
    iconStatus.value = event.target.checked;
}

const menuClosed = () => {
    iconStatus.value = false;
}
</script>

<style scoped>
.navbar {
    @apply relative z-20 flex flex-row w-full py-4 px-4 items-center;
}

.drawer-toggle {
    @apply hidden;
}

.drawer-side {
    @apply z-10;
}

body {
    background-color: whitesmoke;
}

.bg-blue-bright {
    background-color: blue;
}

.hamburger {
    height: 20px;
    width: 26px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.hamburger:hover {
    cursor: pointer;
}

.hamburger__item {
    @apply bg-surface-950 dark:bg-surface-50;
    height: 3px;
    width: 100%;
    transition: transform 300ms cubic-bezier(0.445, 0.05, 0.55, 0.95), opacity 300ms linear;
}

.hamburger--is-open .hamburger__item--first {
    transform: translate(0, 7px) rotate(45deg);
}

.hamburger--is-open .hamburger__item--middle {
    opacity: 0;
}

.hamburger--is-open .hamburger__item--last {
    transform: translate(0, -10px) rotate(-45deg);
}

</style>
