<template>
    <div class="overflow-y-auto pt-16 px-2 bg-white dark:bg-surface-950 h-full">
        <ul class="list-none m-0">
            <li>
                <a v-ripple :href="route('national-league.news')" class="menu-item hover:bg-surface-200 dark:hover:bg-surface-900 p-ripple">
                    <Image src="/img/liga-logo.webp" alt="Liga nacional" width="32" class="mr-3" />
                    <span class="font-medium"><a >Liga Nacional</a></span>
                </a>
            </li>
            <li>
                <a v-ripple class="flex align-items-center cursor-pointer p-3 hover:bg-surface-200 dark:hover:bg-surface-900 transition-duration-150 transition-colors p-ripple">
                    <span class="font-medium text-gray-500"><a >Y proximamente...</a></span>
                </a>
            </li>
            <li>
                <a v-ripple class="flex align-items-center cursor-pointer p-3 border-round hover:bg-surface-200 dark:hover:bg-surface-900 transition-duration-150 transition-colors p-ripple">
                    <i class="pi mr-5"></i>
                    <span class="font-medium text-gray-500">Liga promesas</span>
                </a>
            </li>
            <li>
                <a v-ripple class="flex align-items-center cursor-pointer p-3 border-round hover:bg-surface-200 dark:hover:bg-surface-900 transition-duration-150 transition-colors p-ripple">
                    <i class="pi mr-5"></i>
                    <span class="font-medium text-gray-500">Selección nacional masculina</span>
                </a>
            </li>
            <li>
                <a v-ripple class="flex align-items-center cursor-pointer p-3 border-round hover:bg-surface-200 dark:hover:bg-surface-900 transition-duration-150 transition-colors p-ripple">
                    <i class="pi mr-5"></i>
                    <span class="font-medium text-gray-500">Selección nacional femenina</span>
                </a>
            </li>
            <li>
                <a v-ripple class="flex align-items-center cursor-pointer p-3 border-round hover:bg-surface-200 dark:hover:bg-surface-900 transition-duration-150 transition-colors p-ripple">
                    <i class="pi mr-5"></i>
                    <span class="font-medium text-gray-500">Selección nacional SUB-19</span>
                </a>
            </li>

            <li>
                <a v-ripple :href="route('podcast.episodes')" class="menu-item hover:bg-surface-200 dark:hover:bg-surface-900 p-ripple">
                    <Image src="/img/spotify.webp" alt="Liga nacional" width="32" class="mr-3" />
                    <span class="font-medium"><a >El podcast</a></span>
                </a>
            </li>
        </ul>
    </div>
</template>

<style scoped>
.menu-item {
    @apply flex items-center cursor-pointer p-3 rounded transition duration-150 ;
}
</style>
<script setup>
import Image from 'primevue/image';
</script>
