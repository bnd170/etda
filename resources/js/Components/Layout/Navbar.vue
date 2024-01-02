<template>
    <div class="drawer block">
        <input ref="drawer" id="my-drawer-3" type="checkbox" class="drawer-toggle" @input="toggleMenu" />
        <div class="drawer-content flex flex-col">
            <!-- Navbar -->
            <div class="navbar">
                <div class="flex-none">
                    <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
                        <div class="hamburger" :class="iconStatus ? 'hamburger--is-open' : ''">
                            <div class="hamburger__item hamburger__item--first"></div>
                            <div class="hamburger__item hamburger__item--middle"></div>
                            <div class="hamburger__item hamburger__item--last"></div>
                        </div>
                    </label>
                </div>
                <a href="/" class="flex-1 px-2 mx-2 text-xl font-bold">
                    <img :src="logo" alt="El talon de aquiles" class="w-6 mr-3">
                    El Talón de Aquiles
                </a>
            </div>

            <main>
                <slot/>
            </main>

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
import Menu                       from "~/Components/Layout/Navbar/Menu.vue";
import {ref} from "vue";

const logo = '/img/logo.svg';

const iconStatus = ref(false);

const toggleMenu = (event) => {
    iconStatus.value = event.target.checked;
}
</script>

<style scoped>
.navbar {
    @apply relative z-20;
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
    height: 3px;
    width: 100%;
    background: #111111;
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
