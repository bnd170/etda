<template>
    <section class="overflow-y-auto pt-16 px-2 bg-white dark:bg-surface-950 h-full">
        <header class="flex flex-col h-full justify-between">
            <nav class="">

                <a v-ripple :href="route('national-league.news')"
                   class="menu-item hover:bg-surface-200 dark:hover:bg-surface-900 p-ripple">
                    <Image src="/img/liga-logo.webp" alt="Liga nacional" width="32" class="mr-3"/>
                    <span class="font-medium"><a>Liga Nacional</a></span>
                </a>


                <a v-ripple
                   class="flex align-items-center cursor-pointer p-3 hover:bg-surface-200 dark:hover:bg-surface-900 transition-duration-150 transition-colors p-ripple">
                    <span class="font-medium text-gray-500"><a>Y proximamente...</a></span>
                </a>

                <a v-ripple
                   class="flex align-items-center cursor-pointer p-3 border-round hover:bg-surface-200 dark:hover:bg-surface-900 transition-duration-150 transition-colors p-ripple">
                    <i class="pi mr-5"></i>
                    <span class="font-medium text-gray-500">Liga promesas</span>
                </a>


                <a v-ripple
                   class="flex align-items-center cursor-pointer p-3 border-round hover:bg-surface-200 dark:hover:bg-surface-900 transition-duration-150 transition-colors p-ripple">
                    <i class="pi mr-5"></i>
                    <span class="font-medium text-gray-500">Selección nacional masculina</span>
                </a>


                <a v-ripple
                   class="flex align-items-center cursor-pointer p-3 border-round hover:bg-surface-200 dark:hover:bg-surface-900 transition-duration-150 transition-colors p-ripple">
                    <i class="pi mr-5"></i>
                    <span class="font-medium text-gray-500">Selección nacional femenina</span>
                </a>


                <a v-ripple
                   class="flex align-items-center cursor-pointer p-3 border-round hover:bg-surface-200 dark:hover:bg-surface-900 transition-duration-150 transition-colors p-ripple">
                    <i class="pi mr-5"></i>
                    <span class="font-medium text-gray-500">Selección nacional SUB-19</span>
                </a>


                <a v-ripple :href="route('podcast.episodes')"
                   class="menu-item hover:bg-surface-200 dark:hover:bg-surface-900 p-ripple">
                    <Image src="/img/spotify.webp" alt="Liga nacional" width="32" class="mr-3"/>
                    <span class="font-medium"><a>El podcast</a></span>
                </a>

            </nav>
            <section class="flex flex-col mb-5 px-2">
                <LoggedIn v-if="$page.props.auth.user"/>
                <LoggedOut v-else/>
            </section>
        </header>
    </section>
</template>

<style scoped>
.menu-item {
    @apply flex items-center cursor-pointer p-3 rounded transition duration-150 ;
}
</style>
<script setup>
import Image    from 'primevue/image';
import Header   from "@/Components/League/Header.vue";
import LoggedIn from "@/Components/Layout/Navbar/LoggedIn.vue";
import LoggedOut from "@/Components/Layout/Navbar/LoggedOut.vue";
</script>
